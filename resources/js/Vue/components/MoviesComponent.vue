<template>
  <div>
    <section class="posts container">
      <h1 class="TitlePage">Nuestras Películas</h1>
      <div class="row justify-content-around">
        <div class="card" v-for="movie in result" v-bind:key="movie.id">
          <img src="img/imgIndex.png">
          <div class="card-body">
            <h3 class="card-title">{{ movie.title }}</h3>
            <div class="divider"></div>
            <p class="card-text">
              {{ movie.description }}
            </p>
            <div class="date mb-3">
              <span class="c-gray-1">{{ movie.age }}</span>
            </div>
            <p class="infoCard">{{ movie.number_stock }} unidades disponibles</p>
            <div class="row justify-content-around">
                <div class="col">
                    <button type="button" class="btn btn-info">Editar</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary">Eliminar</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>

import axios from 'axios';

export default {
    data () {
        return {
            result:{}
        }
    },
    created(){
        this.MoviesLoad();
    },
    methods: {
        MoviesLoad(){
            const page = 'http://127.0.0.1:8000/api/movies/';
            axios.get(page)
                .then(
                    ({data}) => {
                        console.log(data)
                        this.result = data;
                    }
                )
        }
    }
};

</script>