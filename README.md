# Административная панель для персонального блога

Это проект административной панели для управления постами в персональном блоге. Приложение позволяет управлять постами, изменять их видимость, редактировать их категории, а также добавлять или удалять изображения для превью.

## Функциональные возможности

- Аутентификация и авторизация с двумя ролями: администратор и модератор
- Администратор может создавать, редактировать и удалять посты
- Модератор может только редактировать посты
- Просмотр всех постов с постраничной навигацией
- Редактирование деталей постов

## Установка

### Шаг 1: Клонирование репозитория

Клонируйте репозиторий на ваш компьютер:

```sh
git clone https://github.com/balguzh1nov/testovoe_blog_laravel

cd blog

composer install

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=blog
DB_USERNAME=postgres
DB_PASSWORD=your_password

php artisan key:generate

php artisan migrate --seed

php artisan serve
