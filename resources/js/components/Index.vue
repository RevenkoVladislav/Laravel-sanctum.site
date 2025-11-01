<script>
import Dropzone from "dropzone";
import { VueEditor } from "vue3-editor"
export default {
    name: "Index",

    data() {
        return {
            dropzone: null,
            title: null,
            images: null,
            content: null
        }
    },

    components: {
      VueEditor
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
            data.append('content', this.content)

            this.title = ''
            this.content = ''

                axios.post('/api/posts/store', data)
                    .then(response => {
                        alert(`Пост ${response.data.post_title} создан ! Загружено файлов ${response.data.images_count}`)
                    })
                    .catch(error => {
                        console.log(error)
                        alert('Ошибка загрузки')
                    })
        },

        handleImageAdded(file, Editor, cursorLocation, resetUploader) {
            const formData = new FormData();
            formData.append("image", file);

            axios.post('api/posts/images/store', formData)
                .then(result => {
                    const url = result.data.url; // Get url from response
                    Editor.insertEmbed(cursorLocation, "image", url);
                    resetUploader();
                })
                .catch(err => {
                    console.log(err);
                });
        },
    }
}
</script>

<template>
    <div class="w-25">
        <input type="text" v-model="title" class="form-control mt-3 mb-3" placeholder="title">
        <div ref="dropzone" class="btn mb-3 p-5 d-block text-center text-light btn-secondary">
            Upload
        </div>
        <div class="mb-3">
            <vue-editor useCustomImageHandler @image-added="handleImageAdded" v-model="content" />
        </div>
        <input @click.prevent="store" type="submit" class="btn btn-primary" value="add">
    </div>
</template>

<style scoped>

</style>
