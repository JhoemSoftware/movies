<template>
    <div>

        <section class="posts container">
            <h1 class="TitlePage">Listado de Rentas</h1>

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 align-self-center">
                            <h3>Agregar Rentas de Películas</h3>
                        </div>
                        <div class="col-3 align-self-center">
                            <button
                                type="button"
                                class="btn btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                            >
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
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
                        Registro de Rentas
                        </h5>
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <h3>Epaaa</h3>
                        <!-- Form -->
                        <!-- <form @submit.prevent="save">
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
                        </form> -->

                    </div>
                </div>
            </div>
            </div>

            <!-- Main Content -->
            <table class="table table-info table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cédula Cliente</th>
                        <th scope="col">Nombre Película</th>
                        <th scope="col">Fecha Entrega</th>
                        <th scope="col">Fecha Devolución</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr v-for="user in result" v-bind:key="user.id">
                        <td>{{ user.name }}</td>
                        <td>{{ user.alias }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <button type="button" class="btn btn-secondary">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" @click="deleted(user)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr> -->
                    <tr>
                        <td>4541212</td>
                        <td>Defiance</td>
                        <td>2022/12/21</td>
                        <td>2022/12/25</td>
                        <td>Sin observaciones</td>
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
