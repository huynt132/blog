<template>
  <b-row>
    <Header/>
    <b-container>
      <!-- begin search  -->
      <b-form class="search-form">
        <b-form-input
            size="sm"
            class="mr-sm-3 search-form__input"
            placeholder="Search article"
        ></b-form-input>
        <b-button
            size="sm"
            class="my-2 my-sm-0 search-form__submit"
            type="submit"
        >Search
        </b-button
        >
      </b-form>
      <!-- end search  -->
      <ListBlog/>
    </b-container>
  </b-row>
</template>
<script>
import Header from "../components/Header.vue";
import ListBlog from "../components/ListBlog.vue";

export default {
  name: "Home",
  components: {
    Header,
    ListBlog,
  },
};
</script>
<style scoped>
.search-form {
  margin-top: 110px;
  margin-left: 15px;
  margin-right: 15px;
  display: flex;
  justify-content: space-around;
}

.search-form__input {
  height: 70px;
  line-height: 70px;
  font-size: 1.2307692308rem;
  flex-basis: 90%;
  margin-right: 10px;
}

.search-form__submit {
  flex-basis: 8%;
}
</style>