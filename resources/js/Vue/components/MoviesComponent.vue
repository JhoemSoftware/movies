<template>
    <div>
        <section class="posts container">
            <h1 class="TitlePage">Nuestras Películas</h1>

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-6 align-self-center">
                            <h3>Agregar Película</h3>
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

            <div class="divider"></div>

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
                                Registro de Películas
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
                                <label class="form-label">Nombre de Película</label>
                                <input
                                    required
                                    tabindex="1"
                                    type="text"
                                    class="form-control"
                                    v-model="movie.title"
                                />
                                </div>
                                <div class="form-group mb-3">
                                <label class="form-label">Género de Película</label>
                                <input
                                    required
                                    tabindex="2"
                                    type="text"
                                    class="form-control"
                                    v-model="movie.genre"
                                />
                                </div>
                                <div class="form-group mb-3">
                                <label class="form-label">Descripción de Película</label>
                                <input
                                    required
                                    tabindex="3"
                                    type="text"
                                    class="form-control"
                                    v-model="movie.description"
                                />
                                </div>
                                <div class="form-group mb-3 row">
                                <div class="col-6">
                                    <label class="form-label">Año de Película</label>
                                    <input
                                    required
                                    tabindex="4"
                                    type="number"
                                    class="form-control"
                                    v-model="movie.age"
                                    />
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Cantidad existencias</label>
                                    <input
                                    required
                                    tabindex="5"
                                    type="number"
                                    class="form-control"
                                    v-model="movie.number_stock"
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
            <div class="row justify-content-center">
                <div class="col-12 col-md-5" v-for="data in result" v-bind:key="data.id">
                    <div class="card">
                        <img src="img/imgIndex.png" />
                        <div class="card-body">
                            <h3 class="card-title">{{ data.title }}</h3>
                            <div class="divider"></div>
                            <p class="card-text">
                                {{ data.description }} <br />
                                <b>Género: </b> {{ data.genre }} <br />
                                <b>Año: </b> {{ data.age }}
                            </p>
                            <p class="infoCard">
                                {{ data.number_stock }} unidades disponibles
                            </p>
                            <div class="row justify-content-around">
                                <div class="col">
                                    <button type="button" class="btn btn-secondary">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-danger" @click="deleted(data)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            result: {},
            movie: {
                title: "",
                genre: "",
                description: "",
                age: "",
                number_stock: "",
            },
            page: "http://127.0.0.1:8000/api/movies/",
        };
    },
    created() {
            this.MoviesLoad();
    },
    methods: {
        MoviesLoad() {
            axios.get(this.page)
                .then(({ data }) => this.result = data )
                .catch(({ data }) => console.log(data) )
        },
        save() {
            this.MoviesSave();
        },
        MoviesSave() {
            axios
                .post(this.page, this.movie)
                    .then(({data}) => {
                        console.log(this.movie);
                        console.log(data);
                        swal("Película Agregada 😀", "", "success");
                        this.MoviesLoad();
                    })
                    .catch(({data}) => {
                        console.log(data);
                        swal("No se pudo Agregar 🤔", data, "error");
                    });
        },
        deleted(info) {
            console.log(info);
            swal({
                title: `¿Seguro deseas eliminar la película ${info.title} ?`,
                text: "Se realizas esta operación no se podrá reversar",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    this.MoviesDelete(info.id);
                    swal("El registro ha sido eliminado", { icon: "success" });
                } else {
                    swal("Haz cancelado la operación");
                }
            });

        },
        MoviesDelete(movie){
            console.log(movie);
            const url = `${this.page}${movie}`;
            console.log(url);
            axios.delete(url)
                .then(()=>{
                    this.MoviesLoad();
                })
                .catch( ({data}) => console.log(data) )
        }
    },
};
</script>