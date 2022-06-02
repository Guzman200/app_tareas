import { createRouter, createWebHistory } from 'vue-router'

import LoginComponent from './LoginComponent';


export const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/inicio-sesion', component: LoginComponent },
    ]
}) 

