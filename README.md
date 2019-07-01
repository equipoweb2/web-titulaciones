# web-titulaciones

## Instrucciones

1. Renombrar archivo `.env.example` a `.env`
2. Crear una base de datos y cambiar los datos de acceso en `.env`
3. Ejecutar los siguientes comandos:

  ``` bash
  php artisan key:generate
  php artisan migrate
  php artisan db:seed
  ```