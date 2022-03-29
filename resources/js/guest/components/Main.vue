<template>
  <div>
    <div v-for="(post, index) in posts" :key="index">
      <h2>{{ post.title }}</h2>
      <p>{{ post.content }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Main",
  data() {
    return {
      posts: [],
    };
  },
  created() {
    axios.get("/api/posts").then((apiResponse) => {
      this.posts = apiResponse.data;
    });
  },
};
</script>

<style scoped>
</style>