# Тестовое задание для PHP developer Clickadilla.com

## Установка и запуск приложения

1. Клонировать этот репозиторий;
2. Создать файл `.env` из файла `.env.example`;
3. Указать в созданном файле настройки для базы данных в 9-14 строках;
4. Из корня проекта сгенерировать ключ приложения командой `php artisan key:generate`;
5. Из корня проекта провести миграции к базе данных с помощью команды `php artisan migrate`;
6. Запустить локальный сервер с помощью `php artisan serve`;
7. Зайти на указанный в консоли адрес для ознакомления с роутингом.

## Тестирование приложения

Для приложения написаны функциональные и unit тесты. Для их запуска:

1. Создайте таблицу `testindicator` (или с другим названием) под тесты;
2. Если вы создали таблицу с другим названием, обновите 28 строку в файле `phpunit.xml`: `<server name="DB_DATABASE" value="testindicator"/>`;
2. Запустите тесты из корня проекта командой  `php artisan test`.
