# FindYourService

Es una web para encontrar servicios cerca tuyo.

## Getting Started

Para esta aplicación estoy usando como motor de base de datos a mysql.

Se deberá configurar los datos de conexion a la base en el archivo .env

Realizar la migración de las tablas.

php artisan migrate:fresh --seed

Este comando crea las tablas correspondientes.
Se guarda ademas un usuario administrador:
email: admin@admin.com
password: 123456




### Installing

Esta aplicación usa datos de la API de Google Maps.
Para comenzar a usar la aplicación, una vez ingreasdo con el usuario administrador se deberá crear distintos servicios y ubicar en el mapa la dirección a fin de que se complete los datos de latitud y longitud autmaticamente a partir de la direccion dada.
Ademas se generará una imagen estatica del mapa con el marker de la ubicación.

Luego de crear los servicios deseados, se puede acceder a la pagina principal para comenzar con las busquedas.

Se hace uso de Bootstrap y jquery para la animacion y diseño de la pagina de forma online, con lo cual, si no hay conexion a internet, el navbar y algunos diseños de objetos pueden no verse como corresponde.




## Authors

* **Federico Garcia**  - [kornis](https://github.com/kornis)



