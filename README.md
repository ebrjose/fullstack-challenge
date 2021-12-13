# SOLUCIÓN: Talently Fullstack Challenge

## SYSTEM REQUIREMENTS
- PHP: v8.0.12
- Node: v14.17.5
- NPM: v6.14.15

## Instalación

```bash
# Install Project Dependencies
$ cd kanban-spa

$ composer install
$ npm install

$ npm run dev
```

```bash
# Setup Environment
$ cp .env.example .env

# Environment Variables
APP_URL=http://kanban-spa.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kanban_spa
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# Migraciones / Datos de Prueba
$ php artisan migrate:fresh --seed

# Usuario de Prueba
Email: user@example.com
Password: password
```

## Librerias Utilizadas

### Backend
- [one2tek/larapi package](https://github.com/one2tek/larapi)
- [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum)

### Frontend
- [Vue 3 - Vue.js](https://v3.vuejs.org/)
- [Tailwindcss](https://tailwindcss.com/)
- [Mitt](https://github.com/developit/mitt)
- [vuedraggable](https://github.com/SortableJS/vue.draggable.next)
