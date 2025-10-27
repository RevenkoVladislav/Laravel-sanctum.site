<script>
import Dropzone from "dropzone";
export default {
    name: "Index",

    data() {
        return {
            dropzone: null
        }
    },

    mounted() {
        this.dropzone = new Dropzone({})
    }
}
</script>

<template>
    <div>
        <button @click.prevent="" ref="dropzone">

        </button>
    </div>
</template>

<style scoped>

</style>
