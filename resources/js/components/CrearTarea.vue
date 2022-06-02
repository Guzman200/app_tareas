<template>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <input
                    v-model="nombre"
                    type="text"
                    class="form-control"
                    placeholder="Ingresar nombre de la tarea"
                />
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <select v-model="categoria_id" class="form-control custom-select">
                    <option value="">Seleccionar categoria de la tara</option>
                    <option v-for="(categoria, index) in categorias" :key="index">
                        {{categoria.descripcion}}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <button class="form-control btn btn-success" @click="agregar">Agregar</button>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
import { responseAxios } from './../helper'

export default {
    data(){
        return {
            nombre : '',
            categoria_id : '',
            categorias : []
        }
    },
    mounted(){
        this.getCategorias();
    },
    methods:{
        getCategorias(){
            axios.get('/api/categorias')
                .then((response) => {
                    console.log(response);
                    this.categorias = response.data;
                }).catch(({response}) => {
                    console.log(response);
                })
        },
        agregar(){

            let data = new FormData();
            data.append('nombre', this.nombre);
            data.append('categoria_id', this.categoria_id);


            axios.post('/api/tareas', data)
                .then((response) => {
                    console.log(response);
                    responseAxios(response)
                }).catch(({response}) => {
                    responseAxios(response)
                    console.log(response);
                })
        }
    }   
};
</script>