import {createWebHistory, createRouter} from 'vue-router';


const routes = [
    {
        path: '/',
        children: [
            {
                path: 'get',
                component: () => import('./components/Get.vue'),
                name: 'app.get'
            },
            {
                path: 'login',
                component: () => import('./components/Login.vue'),
                name: 'app.login'
            },
            {
                path: 'registration',
                component: () => import('./components/Registration.vue'),
                name: 'app.registration'
            },
            {
                path: '/:pathMatch(.*)*',
                component: () => import('./components/NotFound.vue'),
                name: 'app.notFound',
            }
        ]
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
