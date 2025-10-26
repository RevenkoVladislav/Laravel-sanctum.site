<script>


export default {
    name: "App",

    methods: {
        logout() {
            axios.post('/logout')
                .then(response => {
                    this.$router.push({ name: 'app.login' })
                })
        }
    }
}
</script>

<template>
    <div class="row">
        <nav>
            <router-link class="btn btn-primary m-1"
                         :to="{ name: 'app.get'}">Get
            </router-link>
            <router-link class="btn btn-primary m-1"
                         :to="{ name: 'app.login'}">Login
            </router-link>
            <router-link class="btn btn-primary m-1"
                         :to="{ name: 'app.registration'}">Registration
            </router-link>
            <a href="#" @click.prevent="logout" class="btn btn-danger m-1">Logout</a>
        </nav>
    </div>
    <router-view/>
</template>

<style scoped>
</style>
