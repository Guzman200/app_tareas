<template>
    <div class="row">
        <div class="col-12 col-lg-5 col-xl-5">

            <card-perfil :user="user">

                <template v-slot:estadisticas>

                    <!-- Super administrador -->
                    <div v-if="user.tipo_usuario.id == 1" class="row">
                        <div class="col-sm-4">
                            <div class="description-block">
                            <h5 class="description-header">{{estadisticasSuperAdministrador.numero_de_negocios}}</h5>
                            <span class="description-text">Negocios</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 be-1 bs-1">
                            <div class="description-block">
                            <h5 class="description-header">{{estadisticasSuperAdministrador.numero_de_usuarios}}</h5>
                            <span class="description-text">Usuarios</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                            <h5 class="description-header">{{estadisticasSuperAdministrador.numero_de_distribuidores}}</h5>
                            <span class="description-text">Distribuidores</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Administrador -->
                    <div v-if="user.tipo_usuario.id == 2" class="row justify-content-center">
                        <div class="col-sm-4">
                            <div class="description-block">
                            <h5 class="description-header">{{estadisticasAdministrador.numero_de_sucursales}}</h5>
                            <span class="description-text">Sucursales</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 be-1 bs-1">
                            <div class="description-block">
                            <h5 class="description-header">{{estadisticasAdministrador.numero_de_empleados}}</h5>
                            <span class="description-text">Empleados</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </template>

            </card-perfil>

            <!-- EQUIPO DE TRABAJO -->
            <!-- Solo para los superadmin, admin y empleados (soporte y distribuidores no tienen equipo)-->
            <equipo-user v-if="user.tipo_usuario_id == 1 || user.tipo_usuario_id == 2 || user.tipo_usuario_id == 3" :user="user"></equipo-user>
        </div>
        <div class="col-12 col-lg-7 col-xl-7">
            <form-datos-personales :user="user">
                
                <template v-slot:footer="data">
                    <div v-if="user.tipo_usuario.id != 3" class="box-footer text-center">
                        <button v-show="!data.loading" type="button" @click="data.update" class="btn btn-primary">
                            Actualizar datos
                        </button>
                        <button v-show="data.loading" class="btn btn-primary" type="button" >
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Guardando cambios ...
                        </button>
                    </div>  
                </template>

            </form-datos-personales>
        </div>
    </div>
</template>

<script>

import FormDatosPersonales from './../components/users/FormDatosPersonales';
import CardPerfil from './../components/users/CardPerfil';
import EquipoUser from './../components/users/EquipoUser';

export default {
    components : {
        FormDatosPersonales,
        CardPerfil,
        EquipoUser
    },
    data(){
        return {
            user : {
                id         : '',
                nombres    : '',
                apellidos  : '',
                colonia    : '',
                cp         : '',
                created_at : '',
                email      : '',
                estado_id  : '',
                estatus_id : '',
                estado     : {
                    pais_id : undefined
                },
                tipo_usuario : {
                    id : undefined,
                    tipo: ''
                },
                estatus : {
                    id : undefined,
                    descripcion : ''
                },  
                fecha_nacimiento: '',
                genero_id : '',
                telefono  : '',
                tipo_usuario_id : '',
                portada_url : '',
                perfil_url : ''
            },
            estadisticasSuperAdministrador : {
                numero_de_negocios        : 0,
                numero_de_usuarios : 0,
                numero_de_distribuidores  : 0
            },
            estadisticasAdministrador : {
                numero_de_sucursales        : 0,
                numero_de_empleados : 0
            }
        }
    },
    async created(){
 
        this.user = await this.$store.dispatch('getDataUserLogueado');

        if(this.user.tipo_usuario.id == 1){
            this.getEstadisticasSuperAdmin();
        }else if(this.user.tipo_usuario.id == 2){
            this.getEstadisticasAdmin();
        }
        
    }, 
    methods: {
        getEstadisticasSuperAdmin(){
            axios.get('/api/estadisticas/su/generales')
                .then((response) => {
                    this.estadisticasSuperAdministrador = response.data;
                    console.log(response);
                }).catch(({response}) => {
                    console.log(response);
                })
        },
        getEstadisticasAdmin(){
            axios.get('/api/estadisticas/admin/generales')
                .then((response) => {
                    this.estadisticasAdministrador = response.data;
                    console.log(response);
                }).catch(({response}) => {
                    console.log(response);
                })
        }
    }
}
</script>

<style scoped>
    
</style>