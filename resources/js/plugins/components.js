export default {
  install(Vue) {

    const files = require.context("../components", true, /\.vue$/i);

    files.keys().map((key) => {
      Vue.component(
        files(key).default.name ??
          key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
      );
    });
  },
};
