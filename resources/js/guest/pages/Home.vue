<template>
  <div class="container">
    <div v-for="post in posts" :key="post.slug" class="post">
      <img
        v-if="post.image"
        class="cover"
        :src="`/storage/${post.image}`"
        :alt="post.title"
      />

      <h2 class="title">{{ post.title }}</h2>

      <div v-if="post.category" class="category">
        {{ post.category.name }}
      </div>

      <ul class="tags">
        <li class="tag" v-for="tag in post.tags" :key="tag.slug">
          {{ tag.name }}
        </li>
      </ul>

      <p class="content">{{ post.content }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
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

<style lang="scss" scoped>
.container {
  display: flex;
  flex-wrap: wrap;
}

.post {
  width: 200px;
  background: lightblue;

  .title {
    padding: 10px;
  }

  .cover {
    width: 100%;
  }

  .category {
    display: inline-block;
    background: blue;
    padding: 10px;
    border-radius: 5px;
    text-transform: uppercase;
    margin: 0 10px;
  }

  .tags {
    margin: 0 5px;
    .tag {
      background: wheat;
      padding: 0px 10px;
      border-radius: 5px;
    }
  }

  .content {
    padding: 20px 5px;
  }
}
</style>