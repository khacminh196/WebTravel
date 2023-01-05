import axios from "axios";
import Vue from "vue";
// import Cookie from "js-cookie";
// import errorMessage from "../definition/error-messages.json";
import router from "../router";
import store from "../store";
import Cookies from "js-cookie";

let isRefreshing = false;
let failedQueue = [];

const processQueue = (error, token = null) => {
  failedQueue.forEach(prom => {
    if (error) {
      prom.reject(error);
    } else {
      prom.resolve(token);
    }
  })
  
  failedQueue = [];
}


const service = axios.create({
  baseURL: window.location.origin + "/api",
  headers: {
    "Access-Control-Allow-Origin": "*",
    "Access-Control-Allow-Methods": "GET, POST, PATCH, PUT, DELETE, OPTIONS",
    "Access-Control-Allow-Headers": "Origin, Content-Type, X-Auth-Token"
  }
});

service.interceptors.request.use(
  (config) => {
    const token = Cookies.get("onestudy_access_token");
    if (token) {
      config.headers.common["Accept"] = "application/json";
      config.headers.common.Authorization = `Bearer ${token}`;
    }

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);

service.interceptors.response.use(
  (response) => response.data,
  async (error) =>  {
    const vm = new Vue({});

    let msg = null;
    const originalRequest = error.config;

    let urlArray = originalRequest.url?.split('/');

    if (error.response.status == 401 &&
      (!Cookies.get('onestudy_refresh_token') || (urlArray !== undefined && urlArray[urlArray.length - 1] == "refresh-jwt"))) {
      await store.dispatch("auth/logout");
      router.push({ name: "login" });
      await store.commit("general/SET_LOADING" , false);
      vm.$toasted.error(error.response.data.error.message);
      return Promise.reject(error);
    }

    if (error?.response?.data?.error?.code == 4010) {
      if (Cookies.get('onestudy_refresh_token') && !originalRequest._retry) {
        if (isRefreshing) {
          return new Promise(function(resolve, reject) {
            failedQueue.push({ resolve, reject })
          }).then(token => {
            originalRequest.headers['Authorization'] = 'Bearer ' + token;
            return service(originalRequest);
          }).catch(err => {
            return Promise.reject(err);
          })
        }

        originalRequest._retry = true;
        isRefreshing = true;

        return new Promise(function (resolve, reject) {
          store.dispatch("auth/refreshToken", {
            refresh_token: Cookies.get('onestudy_refresh_token')
          })
          .then(res => {
            error.config.headers['Authorization'] = 'Bearer ' + res.token;
            processQueue(null, Cookies.get('onestudy_access_token'));
            resolve(service(originalRequest));
          })
          .catch((err) => {
            processQueue(err, null);
            reject(err);
          })
          .finally(() => { isRefreshing = false })
        });
      }
    } else if (error.response.status == 401 && error?.response?.data?.error?.code == 4012) {
      await store.dispatch("auth/logout");
      router.push({ name: "login" });
      await store.commit("general/SET_LOADING" , false);
      vm.$toasted.error(error.response.data.error.message);
      return Promise.reject(error);
    }
    
    if (error?.response?.data?.error?.code == 4032) {
      await store.dispatch("auth/logout");
      router.push({ name: "login" });
      await store.commit("general/SET_LOADING" , false);
      vm.$toasted.error(error.response.data.error.message);
      return Promise.reject(error);
    }


    if (error?.response?.data?.error?.code == 4031) {
      router.push({ name: "404" });
      return Promise.reject(error);
    }
    
    if (
      [500, 404, 401].includes(error.response.status) &&
        error?.response?.data?.error?.code != 5024  &&
        error?.response?.data?.error?.code != 5025
    ) {
      msg = error.response.data.error.message;
    }

    if (msg && error.response.data.error.code != 4040 || error.response.data.error.code != 5023) {
      if (!window.location.href.includes('/login')) {
        vm.$toasted.error(msg);
      }
    }

    await store.commit("general/SET_LOADING" , false);
    return Promise.reject(error);
  }
);

export default service;
