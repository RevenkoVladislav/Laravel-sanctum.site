<script>


export default {
    name: "App",
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
        </nav>
    </div>
    <router-view/>
</template>

<style scoped>
</style>
