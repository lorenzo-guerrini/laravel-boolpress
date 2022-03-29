<template>
  <div>
    <div class="container">
      <h1>{{ post.title }}</h1>
      <div v-if="post.category" class="category">
        {{ post.category.name }}
      </div>

      <ul class="tags">
        <li class="tag" v-for="tag in post.tags" :key="tag.slug">
          {{ tag.name }}
        </li>
      </ul>
      <img
        v-if="post.image"
        class="cover"
        :src="`/storage/${post.image}`"
        :alt="post.title"
      />
      <div v-html="post.content"></div>

      <p class="content">{{ post.content }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "SinglePost",
  data() {
    return {
      post: {},
    };
  },
  created() {
    axios.get(`/api/posts/${this.$route.params.slug}`).then((apiResponse) => {
      this.post = apiResponse.data;
    });
  },
};
</script>

<style>
</style>