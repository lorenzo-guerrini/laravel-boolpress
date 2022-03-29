<template>
  <div class="container">
    <div v-for="post in posts" :key="post.slug" class="post">
      <router-link
        class="post-link"
        :to="{ name: 'single-post', params: { slug: post.slug } }"
      >
        <img
          v-if="post.image"
          class="cover"
          :src="`/storage/${post.image}`"
          :alt="post.title"
        />
        <h2 class="title">{{ post.title }}</h2>
      </router-link>

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
  name: "Posts",
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
  flex-direction: column;
}

.post {
  background: lightblue;

  display: flex;
  align-items: center;

  .post-link {
    display: flex;

    .title {
      padding: 10px;
    }

    .cover {
      align-self: center;
      max-width: 100px;
      max-height: 100px;
    }
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