<template>
  <div id="app">
    <router-view />
  </div>
</template>

<script>
import Loading from "./components/Loading";

export default {
  name: "App",
  components: {
    Loading
  },

  async mounted() {
    // loading
    this.$loading = this.$refs.loading;
  },
};
</script>

<style lang="scss"></style>
