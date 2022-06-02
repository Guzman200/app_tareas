<template>

    <!-- LOGIN -->
    <div class="col-12">
        <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded10 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <h2 class="text-primary">Bienvenido de nuevo!</h2>
                        <p class="mb-0">Empecemos</p>							
                    </div>
                    <div class="p-40">
                        <p v-show="error" class="text-danger text-center">
                            <i class="fa fa-exclamation-circle"></i>
                            {{mensaje_error}}
                        </p>
                        <form action="#" method="post">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    <input autofocus v-model="nombre_usuario" type="text" class="form-control ps-15 bg-transparent" 
                                        placeholder="Nombre de usuario" @keyup.enter="focus('password')">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                    <input id="password" v-model="contrasenia" type="password" class="form-control ps-15 bg-transparent" 
                                        placeholder="Contraseña" @keyup.enter="iniciarSesion()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="checkbox">
                                    <input v-model="mantener_sesion_abierta" type="checkbox" id="basic_checkbox_1" >
                                    <label for="basic_checkbox_1">Mantener sesión abierta</label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button v-show="cargando == false" @click="iniciarSesion()" type="button" class="btn btn-danger mt-10">Inicia sesión</button>
                                    <button disabled v-show="cargando" type="button" class="btn btn-danger mt-10">Cargando ...</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>	
                        <div class="text-center">
                            <p class="mt-15 mb-0">
                                <a href="javascript:void(0)" class="hover-warning"><i class="ion ion-locked"></i> ¿No tienes cuenta? Registrarse</a><br>
                            </p>
                        </div>	
                    </div>						
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import { responseAxios } from './../../helper';

export default {
    data(){
        return {
            nombre_usuario : '', 
            contrasenia : '',
            mantener_sesion_abierta : false,
            error : false,
            mensaje_error : '',
            cargando : false
        }
    },
    methods: {
        iniciarSesion(){

            if(this.validarDatosLogin()){

                this.cargando = true;
                axios.get('/sanctum/csrf-cookie').then(response => {
                    
                    axios.post('/api/login', {
                        username : this.nombre_usuario,
                        password : this.contrasenia,
                        remember : this.mantener_sesion_abierta,
                        token_recapchat : this.token_recapchat
                    }).then( (response) => {
                        window.location.href = '/';
                    }).catch( ({response}) => {

                        if(response.data.mensaje == undefined){

                            for (var [key, value] of Object.entries(response.data.errors)) {
                                this.error = true;
                                this.mensaje_error = value[0];
                                break;
                            }

                            
                        }else{
                            this.error = true;
                            this.mensaje_error = response.data.mensaje;
                        }
                        console.log(response);
                    }).then(() => {
                        this.cargando = false;
                    })

                });

            }

        },
        validarDatosLogin(){

            if(this.nombre_usuario == ''){
                this.error = true;
                this.mensaje_error = 'Por favor ingresa tu nombre de usuario.';
                return false;
            }

            if(this.contrasenia == ''){
                this.error = true;
                this.mensaje_error = 'Por favor ingresa tu contraseña.';
                return false;
            }

            this.error = false;
            this.mensaje_error = '';
            return true;
        },
        focus(input){
            document.getElementById(input).focus();
        }
    }

}
</script>