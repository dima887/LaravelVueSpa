import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../pages/HomePage";
import About from "../pages/AboutPage";
import Ad from "../pages/AdPage";
import ApartmentIdPage from "../pages/ApartmentIdPage";
import LoginPage from "../pages/User/LoginPage";
import RegisterPage from "../pages/User/RegisterPage";

Vue.use(VueRouter);

const router = new VueRouter( {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/ad',
            name: 'ad',
            component: Ad,
        },
        {
            path: '/ad/:id',
            name: 'adId',
            component: ApartmentIdPage,
        },
        {
            path: '/login',
            name: 'login',
            component: LoginPage,
            // meta: {
            //     guest: true
            // }
        },
        {
            path: '/register',
            name: 'register',
            component: RegisterPage,
            // meta: {
            //     guest: true
            // }
        }
    ],
})

export default router;
