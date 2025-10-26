<script>
export default {
    name: "Login",

    data() {
        return {
            email: null,
            password: null,
        }
    },

    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', { email: this.email, password: this.password, withCredentials: true })
                    .then(response => {
                        this.$router.push({ name: 'app.personal' })
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            });
        }
    }
}
</script>

<template>
    <div class="w-25">
        <input type="email" v-model="email" placeholder="email" class="form-control m-1">
        <input type="password" v-model="password" placeholder="password" class="form-control m-1">
        <input type="submit" @click.prevent="login" value="login" class="btn btn-primary m-1">
    </div>
</template>

<style scoped>

</style>
