<template>
    <div>
        <section class="posts container">
            <h1 class="TitlePage">Nuestros Clientes</h1>

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 align-self-center">
                            <h3>Agregar Cliente</h3>
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
                        Registro de Clientes
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
                                <label class="form-label">Identificación Cliente</label>
                                <input
                                    required
                                    tabindex="1"
                                    type="number"
                                    class="form-control"
                                    v-model="client.identification_number"
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Nombres Cliente</label>
                                <input
                                    required
                                    tabindex="2"
                                    type="text"
                                    class="form-control"
                                    v-model="client.first_name"
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Apellidos Cliente</label>
                                <input
                                    required
                                    tabindex="3"
                                    type="text"
                                    class="form-control"
                                    v-model="client.last_name"
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Descripción / Observación</label>
                                <input
                                    placeholder="Cliente Premium / Básico"
                                    required
                                    tabindex="4"
                                    type="text"
                                    class="form-control"
                                    v-model="client.description"
                                />
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-info" tabindex="5">
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
                <th scope="col">identificación</th>
                <th scope="col">nombres</th>
                <th scope="col">detalles / observaciones</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="client in result" v-bind:key="client.id">
                <td>{{ client.identification_number }}</td>
                <td>{{ client.first_name }} {{ client.last_name }}</td>
                <td>{{ client.description }}</td>
                <td>
                    <button type="button" class="btn btn-secondary">
                    <i class="fa-solid fa-pen"></i>
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" @click="deleted(client)">
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
            page: "http://127.0.0.1:8000/api/clients/",
            client: {
                first_name: '',
                last_name: '',
                identification_number: '',
                description: '',
            },
        };
    },
    created() {
        this.ClientsLoad();
    },
    methods: {
        ClientsLoad() {
            axios.get(this.page)
                .then(({ data }) => this.result = data )
                .catch(({ data }) => console.log(data) )
        },
        save() {
            this.ClientsSave();
        },
        ClientsSave() {
            axios
                .post(this.page, this.client)
                    .then(({data}) => {
                        console.log(data);
                        swal("Registro Exitoso 😀", "", "success");
                        this.ClientsLoad();
                    })
                    .catch(({data}) => {
                        console.log(data);
                        swal("No se pudo Agregar 🤔", data, "error");
                    });
        },
        deleted(info) {
            console.log(info);
            swal({
                title: `¿Seguro deseas eliminar el cliente ${info.identification_number} ?`,
                text: "Se realizas esta operación, no se podrá reversar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    this.ClientsDelete(info.id);
                    swal("El registro ha sido eliminado", { icon: "success" });
                } else {
                    swal("Haz cancelado la operación");
                }
            });

        },
        ClientsDelete(client){
            console.log(client);
            const url = `${this.page}${client}`;
            console.log(url);
            axios.delete(url)
                .then(()=>{
                    this.ClientsLoad();
                })
                .catch( ({data} )=> console.log(data) )
        }
    },
};
</script>