<template>
  <div>
    <section class="posts container">

      <h1 class="TitlePage">Nuestras Películas</h1>

      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Agregar Película</h3>
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
                    <label class="form-label"
                      >Nombre de Película</label
                    >
                    <input
                      required
                      tabindex="1"
                      type="text"
                      class="form-control"
                      v-model="movie.title"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label"
                      >Género de Película</label
                    >
                    <input
                      required
                      tabindex="2"
                      type="text"
                      class="form-control"
                      v-model="movie.genre"
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label"
                      >Descripción de Película</label
                    >
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
                      <label class="form-label"
                      >Año de Película</label
                    >
                    <input
                      required
                      tabindex="4"
                      type="text"
                      class="form-control"
                      v-model="movie.age"
                    />
                    </div>
                    <div class="col-6">
                      <label class="form-label"
                      >Cantidad existencias</label
                    >
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

        <div class="col-3" v-for="rowTable in result" v-bind:key="rowTable.id">
          <div class="card">
          <img src="img/imgIndex.png" />
          <div class="card-body">
            <h3 class="card-title">{{ rowTable.title }}</h3>
            <div class="divider"></div>
            <p class="card-text">
              {{ rowTable.description }} <br>
              <b>Género: </b> {{ rowTable.genre }} <br>
              <b>Año: </b> {{ rowTable.age }}
            </p>
            <p class="infoCard">
              {{ rowTable.number_stock }} unidades disponibles
            </p>
            <div class="row justify-content-around">
              <div class="col">
                <button type="button" class="btn btn-secondary">
                  <i class="fa-solid fa-pen"></i>
                </button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-danger">
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
        title: '',
        genre: '',
        des: '',
        age: '',
        number_stock: '',
      }
    };
  },
  created() {
    this.MoviesLoad();
  },
  methods: {
    MoviesLoad(){
      const page = "http://127.0.0.1:8000/api/movies/";
      axios.get(page).then(({ data }) => {
        this.result = data;
      });
    },
    save(){
      this.MoviesSave();
    },
    MoviesSave(){
      const page = "http://127.0.0.1:8000/api/movies/";
      axios.post(page, this.movie)
        .then(() => swal("Película Agregada 😀", "","success") )
        .catch((err) => swal("No se pudo Agregar 🤔", err , "error"))
    }
  },
};
</script>