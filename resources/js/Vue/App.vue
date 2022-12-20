<template>
  <div>
    <header class="space-inter">
      <div class="container container-flex space-between">
        <h1>MoviesApp</h1>
        <nav class="custom-wrapper" id="menu">
          <div class="pure-menu"></div>
          <ul class="container-flex list-unstyled">
            <li>
              <router-link to="/" class="text-uppercase">inicio</router-link>
            </li>
            <li>
              <router-link to="/users" class="text-uppercase"
                >usuarios</router-link
              >
            </li>
            <li>
              <router-link to="/clients" class="text-uppercase"
                >clientes</router-link
              >
            </li>
            <li>
              <router-link to="/movies" class="text-uppercase"
                >películas</router-link
              >
            </li>
            <li>
              <router-link to="/rents" class="text-uppercase"
                >rentas</router-link
              >
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <router-view></router-view>
  </div>
</template>