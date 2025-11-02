<script>
export default {
    name: "Get",

    data() {
        return {
            posts: []
        }
    },

    mounted() {
      this.getPost()
    },

    methods: {
        getPost() {
            axios.get('/api/posts/get')
                .then(response => {
                    this.posts = response.data.data;
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>

<template>
<div class="mb-5">
    <div v-if="posts.length" class="w-75">
        <div v-for="post in posts" :key="post.id" class="mb-5">
            <hr class="border-5">
            <h2 class="text-center m-3">Заголовок: {{ post.title }}</h2>
            <div v-for="image in post.images" :key="image.id" class="mb-3">
                <p>Preview image</p>
                <img :src="image.preview_url" class="mb-2 25" >
                <h4 class="text-center m-3">Main image</h4>
                <img :src="image.url" class="mb-2 w-75">
                <h4 class="text-center m-3">CONTENT</h4>
                <div class="editor-wrapper ql-editor" v-html="post.content"></div>
            </div>
        </div>
    </div>
</div>
</template>

<style>
/* Стили для изображений внутри ql-editor */
.editor-wrapper img {
    max-width: 100%;
    height: auto;
}
</style>
