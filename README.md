# 📘 Instrucciones de Instalación y Ejecución

Este proyecto contiene una **API REST en Laravel** y una **interfaz frontend en Blade + Tailwind + JavaScript** para gestionar productos.

Sigue los pasos para clonar, instalar y ejecutar la aplicación en tu entorno local.



## 🚀 1. Requisitos Previos

Asegúrate de tener instalado:

* **PHP 8.2+**
* **Composer 2+**
* **MySQL 5.7+**
* **Node.js 18+**
* **NPM 9+**
* **Laravel 11 o 12 (el que use tu proyecto)**

---

## 📥 2. Clonar el Repositorio

```bash
git clone https://github.com/nielDevBinary/prova-tecnica.git
cd nombre-del-repositorio
```

---

## 📦 3. Instalar Dependencias del Backend

```bash
composer install
```

---

## ⚙️ 4. Configurar el Archivo `.env`

Copiar el archivo de entorno:

```bash
cp .env.example .env
```

Generar la clave de Laravel:

```bash
php artisan key:generate
```

Configurar tu base de datos en `.env`:

```
DB_DATABASE=products_db
DB_USERNAME=root
DB_PASSWORD=
```

(*Cambiar según tu entorno local*)

---

## 🗄️ 5. Crear la Base de Datos

En MySQL ejecutar:

```sql
CREATE DATABASE products_db;
```

---

## 🧱 6. Ejecutar las Migraciones

```bash
php artisan migrate
```

---

## 🖥️ 7. Instalar Dependencias del Frontend

```bash
npm install
```

Compilar assets:

```bash
npm run dev
```

---

## ▶️ 8. Iniciar el Servidor

```bash
php artisan serve
```

La aplicación estará disponible en:

```
http://localhost:8000
```

---

## 📡 9. Endpoints Disponibles (API)

| Método | Ruta               | Descripción         |
| ------ | ------------------ | ------------------- |
| GET    | /api/products      | Listar productos    |
| GET    | /api/products/{id} | Ver producto por ID |
| POST   | /api/products      | Crear producto      |
| PUT    | /api/products/{id} | Actualizar producto |
| DELETE | /api/products/{id} | Eliminar producto   |

---

## 🧪 10. Probar la Aplicación

Puedes probar la API usando:

* Postman
* Thunder Client
* Insomnia

O simplemente usar el **frontend incluido en Blade**.



## 👨‍💻 11. Estructura del Proyecto

```
prova-tecnica/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   └── ProductController.php         # Controlador CRUD de productos
│   │   │   └── Controller.php
│   │   └── Requests/
│   │       ├── ProductStoreRequest.php           # Validación para crear producto
│   │       └── ProductUpdateRequest.php          # Validación para actualizar producto
│   └── Services/
│       └── ProductService.php                    # Lógica de negocio y queries SQL
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   ├── api/
│   │   │   └── productsApi.js                    # Lógica de llamadas API
│   │   ├── dom/
│   │   │   └── productsDom.js                    # Funciones que tocan el DOM
│   │   ├── pages/
│   │   │   └── products.js                       # Archivo principal de la página
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views/
│       └── welcome.blade.php
└── routes/
    ├── api.php                                   # Definición de rutas API
    ├── console.php
    └── web.php
```
