<script>


export default {
    name: "App",

    data() {
        return {
            token: localStorage.getItem('auth_token') || ''
        }
    },

    mounted() {
        this.getToken()
        window.addEventListener('storage', () => {
            this.refreshToken()
        })
    },

    updated() {
        this.refreshToken()
    },

    methods: {

        refreshToken() {
            this.token = localStorage.getItem('auth_token') || ''
        },

        getToken() {
            this.token = localStorage.getItem('auth_token')
        },

        logout() {
            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('auth_token');
                    window.dispatchEvent(new Event('storage'))
                    this.$router.push({ name: 'app.login' })
                })
        }
    }
}
</script>

<template>
    <div class="row">
        <nav>
            <router-link class="btn btn-info m-1"
                         v-if="token" :to="{ name: 'app.index'}">Upload image
            </router-link>
            <router-link class="btn btn-primary m-1"
                         :to="{ name: 'app.get'}">Get
            </router-link>
            <router-link class="btn btn-primary m-1"
                         v-if="!token" :to="{ name: 'app.login'}">Login
            </router-link>
            <router-link class="btn btn-primary m-1"
                         v-if="!token" :to="{ name: 'app.registration'}">Registration
            </router-link>
            <router-link class="btn btn-success m-1"
                         v-if="token" :to="{ name: 'app.personal'}">Personal
            </router-link>
            <a href="#" v-if="token" @click.prevent="logout" class="btn btn-danger m-1">Logout</a>
        </nav>
    </div>
    <router-view/>
</template>

<style scoped>
</style>
