<script>
export default {
    name: "Get",

    data() {
        return {
            post: null
        }
    },

    mounted() {
      this.getPost()
    },

    methods: {
        getPost() {
            axios.get('/api/posts/get')
                .then(response => {
                    this.post = response.data.data;
                })
        }
    }
}
</script>

<template>
<div class="mb-5">
    <div v-if="post">
        <h4>{{ post.title }}</h4>
        <div v-for="image in post.images" class="mb-3">
            <img :src="image.preview_url" class="mb-3">
            <img :src="image.url">
        </div>
    </div>
</div>
</template>

<style scoped>

</style>
