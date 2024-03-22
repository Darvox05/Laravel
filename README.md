
# Guía de Inicio para Proyecto Laravel

¡Bienvenido! Esta guía te ayudará a poner en marcha tu proyecto Laravel descargándolo desde Git, configurando tu entorno local, y más.

## 🚀 Descargar el Proyecto

1. **Clonar el Repositorio**: Primero, necesitarás clonar el repositorio de Git donde se encuentra el proyecto. Abre tu terminal y ejecuta el siguiente comando:

```bash
git clone https://url-del-repositorio.git
```

Asegúrate de reemplazar `https://url-del-repositorio.git` con la URL actual de tu repositorio.

2. **Navegar al Directorio del Proyecto**: Una vez clonado, navega al directorio del proyecto:

```bash
cd nombre-del-proyecto
```

## 🔧 Configuración del Entorno

Antes de iniciar el proyecto, necesitarás configurar algunas cosas:

1. **Instalar Dependencias**: Instala las dependencias de PHP con Composer:

```bash
composer install
```

2. **Configurar Archivo `.env`**: Copia el archivo `.env.example` a `.env`:

```bash
cp .env.example .env
```

Ahora, abre el archivo `.env` y configura tu conexión a la base de datos:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Asegúrate de ajustar `DB_DATABASE`, `DB_USERNAME`, y `DB_PASSWORD` según tu entorno de base de datos.

3. **Generar Clave de Aplicación**: Genera una nueva clave de aplicación con Artisan:

```bash
php artisan key:generate
```

## 📚 Migraciones de la Base de Datos

Antes de iniciar el servidor, asegúrate de que tu base de datos esté lista:

1. **Ejecutar Migraciones**: Crea las tablas necesarias en tu base de datos:

```bash
php artisan migrate
```

## 🌐 Iniciar el Servidor de Desarrollo

Finalmente, inicia el servidor de desarrollo:

```bash
php artisan serve
```

Este comando pondrá en marcha un servidor de desarrollo en `http://localhost:8000`.


