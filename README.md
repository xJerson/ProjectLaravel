📦 Instalación
Requisitos Previos
•	PHP >= 8.4
•	Composer
•	MySQL
Pasos de Instalación
1.	Clonar el repositorio
git clone https://github.com/xJerson/ProjectLaravel

- Instalar dependencias de PHP
composer install
- Crear el archivo de entorno

cp .env.example .env

- Configurar la base de datos en .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vip2cars_crud
DB_USERNAME=root
DB_PASSWORD=


⚠️ Asegúrate de haber creado la base de datos manualmente en MySQL:

CREATE DATABASE vip2cars_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
- Generar la clave de aplicación
php artisan key:generate

- Ejecutar migraciones y poblar con datos de prueba
php artisan migrate:fresh --seed
- Iniciar el servidor de desarrollo

php artisan serve

- Acceder a la aplicación
http://localhost:8000


