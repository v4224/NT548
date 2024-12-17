# Sử dụng PHP image chính thức với Apache
FROM php:8.2-apache

# Cài đặt các phần mở rộng cần thiết để kết nối MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy mã nguồn của bạn vào container
COPY . /var/www/html

# Thiết lập quyền truy cập
RUN chown -R www-data:www-data /var/www/html

# Expose cổng HTTP
EXPOSE 80