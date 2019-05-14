# Vue-Test

Intruction for project setup
1. git clone https://github.com/swan03/vue-test.git
2. cd vue-test
3. composer update
4. Open mysql and create databse 'test'
5. configure .env file at root level
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=bullscript_stage
        DB_USERNAME=root
        DB_PASSWORD='Swan123#'
6. php artisan config:clear
7. php artisan migrate
8. php artisan db:seed
9. ./clear.sh
10. npm install
11. npm run dev
12. php artisan serve 
    Laravel development server started: <http://127.0.0.1:8000>
