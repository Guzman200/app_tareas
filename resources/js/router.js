import { createRouter, createWebHistory } from 'vue-router'

import Tareas from './views/Tareas'
import MyPerfil from './views/MyPerfil'

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Tareas },
        { path: '/mi-perfil', component: MyPerfil }
    ]
})

