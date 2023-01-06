import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import component from "./plugins/components";
import utils from "./utils";
import MyFunction from "./plugins/functions";
import CKEditor from '@ckeditor/ckeditor5-vue2';

import Toasted from "vue-toasted";
import "../assets/admin/admin.css";

Vue.use(MyFunction);
Vue.use(utils);
Vue.use(component);
Vue.use(CKEditor);
Vue.use(Toasted, {
  theme: "toasted-primary",
  position: "top-center",
  className: "toast-custom",
  duration: 2000,
});

new Vue({
  router,
  store,
  CKEditor,
  render: (h) => {
    return h();
  },
  ...App,
}).$mount("#app");
