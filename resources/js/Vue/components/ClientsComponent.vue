<template>
  <div>
    <section class="posts container">
      <h1 class="TitlePage">Nuestros Clientes</h1>
      <div class="card">
          <div class="card-body">
            <h3 class="card-title">Agregar Cliente</h3>
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
                  <h5 class="modal-title" id="exampleModalLabel">Registro de Clientes</h5>
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
                          <button type="button" class="btn btn-info">
                            <i class="fa-solid fa-floppy-disk"></i>
                          </button>
                      </div>
                  </form>
              </div>
              </div>
          </div>
        </div>
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
            <td> {{ client.identification_number }} </td>
            <td> {{ client.first_name }} {{ client.last_name }} </td>
            <td> {{ client.description }} </td>
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
    };
  },
  created() {
    this.ClientsLoad();
  },
  methods: {
    ClientsLoad() {
      const page = "http://127.0.0.1:8000/api/clients/";
      axios.get(page).then(({ data }) => {
        this.result = data;
      });
    },
  },
};
</script>