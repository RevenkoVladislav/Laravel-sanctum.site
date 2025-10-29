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
            addRemoveLinks: true,
        })
    },

    methods: {
        store() {
            const data = new FormData()
            const files = this.dropzone.getAcceptedFiles()

            files.forEach(file => {
                data.append('images[]', file)
                this.dropzone.removeFile(file)
            })

            data.append('title', this.title)
            this.title = ''

                axios.post('/api/posts/store', data)
                    .then(response => {
                        alert(`Пост ${response.data.post_title} создан ! Загружено файлов ${response.data.images_count}`)
                    })
                    .catch(error => {
                        console.log(error)
                        alert('Ошибка загрузки')
                    })
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
