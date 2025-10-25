<script>


export default {
    name: "App",
}
</script>

<template>
    <div>
        <nav>
            <router-link class="btn btn-primary"
                         :to="{ name: 'app.get'}">Get
            </router-link>
            <router-link class="btn btn-primary"
                         :to="{ name: 'app.login'}">Login
            </router-link>
            <router-link class="btn btn-primary"
                         :to="{ name: 'app.registration'}">Registration
            </router-link>
        </nav>
    </div>
    <router-view/>
</template>

<style scoped>

</style>
