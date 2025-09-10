📦 Instalación
Requisitos Previos
•	PHP >= 8.4
•	Composer
•	MySQL
Pasos de Instalación
1.	Clonar el repositorio
git clone https://github.com/tu-usuario/vip2cars-crud.git
cd vip2cars-crud
2.	Instalar dependencias de PHP
composer install
3.	Configurar el archivo de entorno
cp .env.example .env
4.	Configurar la base de datos en .env
# Para MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vip2cars_crud
DB_USERNAME=root
DB_PASSWORD=tu_password

5.	Generar clave de aplicación
php artisan key:generate

7.	Ejecutar migraciones
php artisan migrate
8.	Poblar con datos de prueba (opcional)
php artisan db:seed
9.	Iniciar servidor de desarrollo
php artisan serve
10.	Acceder a la aplicación
http://localhost:8000
create base de datos 
vip2cars_crud
comando para migrar 
php artisan migrate
