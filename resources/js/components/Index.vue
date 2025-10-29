<script>
import Dropzone from "dropzone";
export default {
    name: "Index",

    data() {
        return {
            dropzone: null,
            title: null,
            images: null,
        }
    },

    mounted() {
        this.dropzone = new Dropzone(this.$refs.dropzone, {
            url: "/api/posts/store",
            autoProcessQueue: false,
        })
    },

    methods: {
        store() {
            const images = new FormData()
            const files = this.dropzone.getAcceptedFiles()
            files.forEach(file => {
                images.append('images[]', file)
            })
                axios.post('/api/posts/store', images)
        }
    }
}
</script>

<template>
    <div class="w-25">
        <input type="text" v-model="title" class="form-control mt-3 mb-3" placeholder="title">
        <div ref="dropzone" class="btn mb-3 p-5 d-block text-center text-light btn-secondary">
            Upload
        </div>
        <input @click.prevent="store" type="submit" class="btn btn-primary" value="add">
    </div>
</template>

<style scoped>

</style>
