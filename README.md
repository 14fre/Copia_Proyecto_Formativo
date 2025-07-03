<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

# SICEFADOS - Módulo de Gestión de Equipos

## Descripción
SICEFADOS es un sistema web desarrollado para la gestión de inventarios, equipos y solicitudes de baja en ambientes institucionales. Permite registrar, visualizar y reportar elementos asignados a diferentes ambientes y responsables, facilitando la administración y el control de los recursos físicos.

## Funcionalidades principales
- Registro y visualización de elementos/equipos asignados a ambientes.
- Filtro por ambiente para localizar equipos fácilmente.
- Visualización detallada de cada elemento (características, responsable, estado, etc.).
- Modal para reporte de daño (formulario visual, sin funcionalidad de guardado por ahora).
- Interfaz profesional y moderna basada en AdminLTE.

## Estado del proyecto
- **Módulo de inventario:** Completamente funcional (alta, visualización, filtrado y detalles).
- **Reportes de daño:** Formulario visual implementado, pendiente funcionalidad de guardado y gestión.
- **Página de bienvenida:** Estilizada y coherente con el resto del sistema.

## Tecnologías utilizadas
- **Backend:** PHP 8.x, Laravel 8.x
- **Frontend:** Blade, Bootstrap 5, AdminLTE, FontAwesome
- **Base de datos:** MySQL
- **Control de versiones:** Git

## Integrantes del equipo
- Freimar Espitia (14fre)
- [Agrega aquí los nombres de los demás integrantes]

## Instalación y ejecución
1. Clona el repositorio:
   ```bash
   git clone https://github.com/14fre/Copia_Proyecto_Formativo.git
   ```
2. Instala las dependencias:
   ```bash
   composer install
   npm install && npm run dev
   ```
3. Configura el archivo `.env` con tus credenciales de base de datos y ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```
4. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```
5. Accede a la aplicación en [http://localhost:8000](http://localhost:8000)

## Notas
- El módulo de reportes de daño está en desarrollo, actualmente solo muestra el formulario visual.
- El sistema está preparado para futuras ampliaciones (edición, eliminación, reportes avanzados, etc.).

## Licencia
Este proyecto es de uso académico y está bajo la licencia MIT.
