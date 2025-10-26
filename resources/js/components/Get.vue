<script>
export default {
    name: "Get",

    mounted() {
      this.getData()
    },

    methods: {
        getData() {
            axios.get('/api/get', { withCredentials: true })
                .then( response => {
                console.log(response);
            })
        }
    }
}
</script>

<template>
<div>
    get
</div>
</template>

<style scoped>

</style>
