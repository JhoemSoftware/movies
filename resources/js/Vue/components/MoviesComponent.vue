<template>
  <div>
    <section class="posts container">
      <h1 class="TitlePage">Nuestras Películas</h1>
      <div class="row justify-content-around">

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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registro de Películas</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3">
                          <input type="button" class="btn btn-info" value="Registrar">
                      </div>
                  </form>
              </div>
              </div>
          </div>
        </div>
        
        <div class="card" v-for="movie in result" v-bind:key="movie.id">
          <img src="img/imgIndex.png" />
          <div class="card-body">
            <h3 class="card-title">{{ movie.title }}</h3>
            <div class="divider"></div>
            <p class="card-text">
              {{ movie.description }}
            </p>
            <div class="date mb-3">
              <span class="c-gray-1">{{ movie.age }}</span>
            </div>
            <p class="infoCard">
              {{ movie.number_stock }} unidades disponibles
            </p>
            <div class="row justify-content-around">
              <div class="col">
                <button type="button" class="btn btn-info">
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
    </section>
  </div>
</template>
<script>
import axios from "axios";

export default {
  data() {
    return {
      result: {},
    };
  },
  created() {
    this.MoviesLoad();
  },
  methods: {
    MoviesLoad() {
      const page = "http://127.0.0.1:8000/api/movies/";
      axios.get(page).then(({ data }) => {
        console.log(data);
        this.result = data;
      });
    },
  },
};
</script>