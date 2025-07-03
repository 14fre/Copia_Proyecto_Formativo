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
SICEFADOS es un sistema web desarrollado para la gestión de inventarios, equipos y solicitudes de baja en ambientes institucionales. Permite registrar, visualizar y reportar elementos asignados a diferentes ambientes y responsables, facilitando la administración y el control de los recursos físicos, y asi reduciendo la carga manual de trabaja  continuio.

## Funcionalidades principales
- Registro y visualización de elementos/equipos asignados a ambientes.
- Filtro por ambiente para localizar equipos fácilmente.
- Visualización detallada de cada elemento (características, responsable, estado, etc.).
- Modal para reporte de daño (formulario visual, sin funcionalidad de guardado por ahora).
- Interfaz profesional y moderna basada en AdminLTE.

- ## Principal problema
- El principal problema es que al  ser sicefa un sistema de gestion de modulos que abarca un sistema de bases de datos  intentando mantener una estructura de modelado de integracion,  en casos hay  modulos que dependen especificamente de otro modulo, ala falta de actualizacion de las base de datos, se  nos dificulto el tema de  filtrar elementos de los ambientes ya que en sicefa no se encotraba un modulo desarrollado para ejercer esa funcion, dado el caso nosotros mismos   creamos los elementos relacionandos con un ambiente en espesifico, dado el casos  que esa funcionalidad  no esta en nuestro proyecto formativo el cual  es SIBAF sistema de gestion  de bajas  de ambientes de formacion, no se avanzado lo suficiente esperando una actualizacion  de la base de datos por parte de GPES, que esta a cargo de Un grupo de adso de la 86.
- 
- 

## Estado del proyecto
- **Módulo de inventario:** Completamente funcional (alta, visualización, filtrado y detalles).
- **Reportes de daño:** Formulario visual implementado, pendiente funcionalidad de guardado y gestión.
- **Página de bienvenida:** Estilizada y coherente con el resto del sistema.

## Tecnologías utilizadas

<p>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" alt="Laravel" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" alt="Bootstrap" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" alt="Git" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML5" width="40" height="40"/>
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS3" width="40" height="40"/>
</p>

- **Backend:** PHP 8.1.x, Laravel 8.x  
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
   al configurar el .env  ejecuta php artisan key:generate
   php artisan migrate
   ```
4. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```
5. Accede a la aplicación mediante la url

## Notas
- El módulo de reportes de daño está en desarrollo, actualmente solo muestra el formulario visual.
- El sistema está preparado para futuras ampliaciones (, eliminación, reportes  avanzados, bajas, etc.).

## Licencia
Este proyecto es de uso académico y está bajo la licencia MIT.
