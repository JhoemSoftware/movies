import './bootstrap';
import {createApp} from 'vue';
import {createRouter,createWebHashHistory} from 'vue-router';
import App from './Vue/App.vue';
import HomeComponent from './Vue/components/HomeComponent.vue';
import MoviesComponent from './Vue/components/MoviesComponent.vue';
import UsersComponent from './Vue/components/UsersComponent.vue';
import ClientsComponent from './Vue/components/ClientsComponent.vue';
import RentsComponent from './Vue/components/RentsComponent.vue';

const routes = [
    {
        path: '/',
        component: HomeComponent
    },
    {
        path: '/movies',
        component: MoviesComponent
    },
    {
        path: '/users',
        component: UsersComponent
    },
    {
        path: '/clients',
        component: ClientsComponent
    },
    {
        path: '/rents',
        component: RentsComponent
    },
]


const router = createRouter({
    history: createWebHashHistory(),
    routes
})

const app = createApp(App)
app.use(router)
app.mount('#app');