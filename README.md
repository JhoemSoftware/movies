<p align="center">
    <img src="https://cdn.icon-icons.com/icons2/2530/PNG/512/laravel_button_icon_151953.png" width="90" height="31">
    <img src="https://cdn.icon-icons.com/icons2/2530/PNG/512/vue_button_icon_151943.png" width="90" height="30">
</p>
<h1 align="center">
🎬 App Movies 📽️
</h1>

## SPA Descripción

- Aplicación web desarrollada con Laravel 9 & Vue 3
- Base de datos en Mysql
- Tailwind CSS y Bootstrap 5

Para la ejecución es necesario contar con la instación de <b>Laragon</b> con <span style="color:#FF6060">versión de PHP superior a 8</span>, <b>Node JS</b> y <b>Composer</b> para la instalación de paquetes necesarios tanto para Laravel como para Vue. <br>

No todos los paquetes fueron instalados, por medio de CDN se accedió a <b>BOOTSTRAP 5</b>, <b>SweeAlert JS</b>, <b>FontIcons</b>. <br><br>
En el archivo <b>package.json</b> se evidencian las dependencias instaladas y necesarias para la ejecución del SPA<br><br>
El archivo <b>vite.config.js</b> que reemplaza al "webpack" que venía en versiones anteriores de Laravel, ya se encuentra configurado para su uso conectando el front con el back de manera correcta y en el archivo <b>app.blade.php</b> se encuentra conectado de igual modo los CDN mencionados anteriormente
<code>@vite('resources/js/app.js')</code><br><br>

Luego de la instalación de todos los paquetes necesarios es necesario configurar la Base de Datos, como se dijo anteriormente se realizó con <b>MySql</b> y la información de conexión  debe estar en el archivo <b>.env</b> con <code>DB_DATABASE=movies_rent</code>, usuario el de siempre y sin password. <br><br>

Es necesario levantar los dos servicios <b>(Laravel, Vue)</b> para poder trabajar en el SPA, no se separó el proyecto en Back y Front entonces todo lo necesario se encuentra en éste repositorio y las instalaciones anteriormente mencionadas