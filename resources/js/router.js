import {createWebHistory, createRouter} from 'vue-router';


const routes = [
    {
        path: '/',
        children: [
            {
                path: 'index',
                component: () => import('./components/Index.vue'),
                name: 'app.index'
            },
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
                path: 'personal',
                component: () => import('./components/Personal.vue'),
                name: 'app.personal'
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

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('auth_token');

    if (!token) {
        if (to.name === 'app.login' || to.name === 'app.registration') {
            return next()
        } else {
            return next({
                name: 'app.login'
            })
        }
    }

    if (to.name === 'app.login' || to.name === 'app.registration' && token) {
        return next({
            name: 'app.personal'
        })
    }

    next()
})

export default router;
