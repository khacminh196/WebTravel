import toast from "./toast";
import service from "./axios";

export default {
  install(Vue) {
    Vue.prototype.$toast = toast;
    Vue.prototype.$axios = service;
  },
};
