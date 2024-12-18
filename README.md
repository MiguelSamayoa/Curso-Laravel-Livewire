# Proyecto: Foro Dinámico con Laravel Livewire

Este proyecto es el resultado del **"Curso de Interfaces Dinámicas con Laravel Livewire"** impartido en Platzi. Es una aplicación web de tipo foro que permite gestionar temas y categorías, así como la interacción entre usuarios mediante preguntas y respuestas.

## Características Principales

- **Gestión de Categorías:** Los temas del foro se organizan por categorías.
- **CRUD de Preguntas:** Los usuarios pueden crear, ver, editar y eliminar preguntas. La edición y eliminación solo están permitidas para los usuarios que las crearon.
- **Respuestas Anidadas:** Cada pregunta puede tener respuestas, y las respuestas pueden anidarse, permitiendo responder a otras respuestas.
- **Interfaz Dinámica:** Implementación de componentes interactivos con Laravel Livewire para una experiencia de usuario fluida.
- **Gestión de Usuarios:** Autenticación y autorización para garantizar que los usuarios solo puedan modificar sus propias preguntas y respuestas.
- **Gestión de Base de Datos:** Migraciones y semillas para configurar y poblar la base de datos de forma sencilla.

## Tecnologías Utilizadas

- **Framework:** Laravel (versión compatible con Livewire).
- **Lenguaje:** PHP.
- **Base de Datos:** MySQL (configurable según el entorno).
- **Frontend:** Blade, Livewire.
- **Herramientas Adicionales:** Composer, Artisan, y migraciones para el manejo de la base de datos.

## Instalación y Configuración

1. **Clonar el Repositorio:**
    ```bash
    git clone https://github.com/usuario/proyecto-foro.git
    cd proyecto-foro
    ```

2. **Instalar Dependencias:**
    ```bash
    composer install
    npm install && npm run dev
    ```

3. **Configurar el Entorno:**
    Copia el archivo `.env.example` y renómbralo a `.env`. Luego configura la conexión a la base de datos:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_base_datos
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña
    ```

4. **Generar la Clave de la Aplicación:**
    ```bash
    php artisan key:generate
    ```

5. **Ejecutar Migraciones y Poblar la Base de Datos:**
    ```bash
    php artisan migrate --seed
    ```

6. **Levantar el Servidor:**
    ```bash
    php artisan serve
    ```
    Accede a la aplicación en `http://localhost:8000`.

## Comandos Útiles

- **Ejecutar Migraciones:**
    ```bash
    php artisan migrate
    ```

- **Revertir Migraciones:**
    ```bash
    php artisan migrate:rollback
    ```

- **Poblar la Base de Datos:**
    ```bash
    php artisan db:seed
    ```

- **Limpiar y Reiniciar la Base de Datos:**
    ```bash
    php artisan migrate:fresh --seed
    ```

## Recursos Adicionales

- [Documentación de Laravel](https://laravel.com/docs)
- [Documentación de Laravel Livewire](https://laravel-livewire.com/docs)
- [Platzi: Curso de Interfaces Dinámicas con Laravel Livewire](https://platzi.com/cursos/laravel-livewire/)

## Notas

Este proyecto está diseñado para propósitos educativos y puede ser adaptado para proyectos reales. Si deseas contribuir o reportar problemas, por favor crea un issue o envía un pull request.
