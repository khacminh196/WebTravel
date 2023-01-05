import Vue from "vue";

const toast = (message, variant = "success") => {
  const vm = new Vue({});
  return vm.$bvToast.toast(message, {
    noCloseButton: false,
    autoHideDelay: 2000,
    appendToast: true,
    toaster: "b-toaster-top-center",
    variant,
    noFade: false,
    solid: true,
    headerClass: "d-none"
  });
};

export default toast;
