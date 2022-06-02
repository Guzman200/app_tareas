import { createRouter, createWebHistory } from 'vue-router'

import Tareas from './views/Tareas'
import EditarTarea from './views/EditarTarea'
import MyPerfil from './views/MyPerfil'

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Tareas },
        { path: '/mi-perfil', component: MyPerfil },
        { path: '/editar-tarea/:id', component : EditarTarea}
    ]
})

