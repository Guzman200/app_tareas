<template>
    <div>
        <div id="loader"></div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">App tareas</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarText"
                aria-controls="navbarText"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"
                            >Tareas <span class="sr-only">(current)</span></a
                        >
                    </li>
                </ul>
                <span
                    class="navbar-text"
                    @click="cerrarSesion"
                    style="cursor: pointer"
                >
                    Cerrar sesión
                </span>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        cerrarSesion() {
            axios
                .post("/api/logout")
                .then((response) => {
                    window.location.href = "/";
                })
                .catch(({ response }) => {
                    window.location.href = "/";
                });
        },
    },
};
</script>

<style>
.btn-primary {
    background-color: #d32f36 !important;
    border-color: #d32f36 !important;
}

.theme-primary .btn-primary:hover,
.theme-primary .btn-primary:active,
.theme-primary .btn-primary:focus,
.theme-primary .btn-primary.active {
    background-color: #c01c26 !important;
    border-color: #c01c26 !important;
    color: #ffffff !important;
}
</style>