<template>
  <div class="d-flex mb-3 list-blog__container">
    <b-col class="blog-item" v-for="post in posts" v-bind:key="post.id">
      <b-row>
        <img
            v-bind:src="post.Post.image"
            alt=""
            class="blog-item__img"
        />
      </b-row>
      <b-row class="blog-item__content">
        <span class="blog-item__category">Back-End</span>
        <h3 class="blog-item__title">
          {{ post.Post.title }}
        </h3>
        <div class="blog-item__short-des">
          {{ post.Post.short_des }}
        </div>
        <p class="blog-item__time">{{ post.Post.created_at }}</p>
      </b-row>
    </b-col>
    <div v-if="posts.length" v-observe-visibility="handleScrolledToBottom"></div>
  </div>
</template>

<script>
import axios from "@/axios";

export default {
  name: "ListBlog",
  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: 1,
    };
  },
  mounted() {
    this.loadPosts();
  },
  methods: {
    loadPosts: function () {
      axios
          .get('posts?page=1&limit=9')
          // .get('posts?page='+${this.currentPage+'&limit=9'})
          .then((res) => {
            this.posts.push(...res.data.data);
            this.lastPage = res.data.maxPage;
          })
          .catch(err => {
            console.error(err);
          });
    },

    //scroll to request more data from api
    handleScrolledToBottom: function (isVisible) {
      if (!isVisible) {
        return;
      }
      if (this.currentPage >= this.lastPage) {
        return;
      }
      this.currentPage++;
      this.loadPosts();
    }
  },
};
</script>

<style scoped>
.blog-item {
  flex-basis: 30%;
  background-color: #fff;
  margin-left: 15px;
  margin-right: 15px;
  margin-bottom: 30px;
  border: 1px solid #ccc;
  cursor: pointer;
}

.list-blog__container {
  flex-wrap: wrap;
  margin-top: 50px;
}

.blog-item__img {
  width: 100%;
}

.blog-item__content {
  padding: 0 30px 30px;
}

/* limited text  */
.blog-item__short-des {
  font-size: 1rem;
  color: #525252;
  display: block;
  width: 200px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  margin-top: 20px;
  margin-bottom: 20px;
}

.blog-item__time {
  color: #525252;
}

.blog-item__title {
  font-size: 1.3076923077rem;
  margin-top: 15px;
}

.blog-item__category {
  margin-top: 15px;
  color: red;
}

@media (max-width: 750px) {
  .blog-item {
    flex-basis: 100%;
  }
}
</style>
