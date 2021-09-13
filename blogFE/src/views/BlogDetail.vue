<template>
  <b-row>
    <Header />
    <Blog />
  </b-row>
</template>
<script>
import Blog from "../components/Blog.vue";
import Header from "../components/Header.vue";
export default {
  name: "BlogDetail",

  components: {
    Header,
    Blog,
  },
};
</script>
<style scoped>
</style>