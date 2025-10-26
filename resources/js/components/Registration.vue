<script>
export default {
    name: "Registration",

    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null
        }
    },

    methods: {
        registration() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation,
                        withCredentials: true
                    }).then(response => {
                        localStorage.setItem('auth_token', 'auth')
                        window.dispatchEvent(new Event('storage'))
                        this.$router.push({ name: 'app.personal'})
                    }).catch(error => {
                        console.log(error.response)
                    })
                })
        }
    }

}
</script>

<template>
    <div class="w-25">
        <input type="text" v-model="name" placeholder="name" class="form-control m-1">
        <input type="email" v-model="email" placeholder="email" class="form-control m-1">
        <input type="password" v-model="password" placeholder="password" class="form-control m-1">
        <input type="password" v-model="password_confirmation" placeholder="password_confirmation" class="form-control m-1">
        <input type="submit" @click.prevent="registration" value="registration" class="btn btn-primary m-1">
    </div>
</template>

<style scoped>

</style>
