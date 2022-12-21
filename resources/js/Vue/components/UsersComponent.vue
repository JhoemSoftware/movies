<template>
    <div>
        <section class="posts container">
            <h1 class="TitlePage">Listado de Usuarios</h1>

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Agregar Usuario</h3>
                    <div class="divider mb-3 mt-3"></div>
                    <p class="card-text">
                    <button
                        type="button"
                        class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                    >
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    </p>
                </div>
            </div>

            <!-- Modal -->
            <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
            >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                        Registro de Usuario
                        </h5>
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        
                        <!-- Form -->
                        <form @submit.prevent="save">
                            <div class="form-group mb-3">
                                <label class="form-label">Nombres de Usuario</label>
                                <input
                                    required
                                    tabindex="1"
                                    type="text"
                                    class="form-control"
                                    v-model="user.name"
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email de Usuario</label>
                                <input
                                    required
                                    tabindex="3"
                                    type="email"
                                    class="form-control"
                                    v-model="user.email"
                                />
                            </div>
                            <div class="form-group mb-3 row">
                                <div class="col-6">
                                    <label class="form-label">Alias</label>
                                    <input
                                        required
                                        tabindex="2"
                                        type="text"
                                        class="form-control"
                                        v-model="user.alias"
                                    />
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Contraseña</label>
                                    <input
                                    required
                                    tabindex="4"
                                    type="password"
                                    class="form-control"
                                    v-model="user.password"
                                    />
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-info" tabindex="6">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            </div>

            <!-- Main Content -->
            <table class="table table-info table-hover">
                <thead>
                    <tr>
                        <th scope="col">nombres</th>
                        <th scope="col">usuario</th>
                        <th scope="col">email</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in result" v-bind:key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.alias }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </section>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            result: {},
            page: "http://127.0.0.1:8000/api/users/",
            user: {
                name: '',
                alias: '',
                email: '',
                password: '',
            },
        };
    },
    created() {
        this.UsersLoad();
    },
    methods: {
        UsersLoad(){
            axios.get(this.page)
                .then(({ data }) => this.result = data )
                .catch(({ data }) => console.log(data) )
        },
        save() {
            this.UsersSave();
        },
        UsersSave(){
            axios
                .post(this.page, this.user)
                    .then(({data}) => {
                        console.log(this.user);
                        console.log(data);
                        swal("Registro Exitoso 😀", "", "success");
                        this.UsersLoad();
                    })
                    .catch(({data}) => {
                        console.log(data);
                        swal("No se pudo Agregar 🤔", data, "error");
                    });
        },
    },
};
</script>