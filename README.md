### cài đặt laragon về để chạy cho nó mượt.

## Tạo database name: fast_pho trong csdl

sau đó vô thư mục laragon đã tải về.
\*\*\laragon\bin\cmder

trong này có cái Cmder.exe
mở vô trong rồi chạy các cái lệnh dưới

# chạy lệnh sau để cài đặt thư viện

composer install --no-progress --no-interaction

# chạy lệnh sau để tạo file .env

cp .env.example .env

# chạy các lệnh sau để nó cấu hình các kiểu

php artisan migrate
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan storage:link
