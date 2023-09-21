# Mạng xã hội

## 1. Giới thiệu

- Mạng xã hội tương tự Facebook, được xây dựng bằng Yii2(PHP)
- Chức năng chính:

  - Đăng nhập, đăng ký, quên mật khẩu
  - Có thế tích hợp nhiều loại đăng nhập khác nhau: Facebook, Google, Keycloak, ...
  - Có nhiều Extension để mở rộng chức năng: Tùy chỉnh theme, tạo trang tùy chỉnh, ...
  - Phân quyền theo nhóm, tạo nhóm riêng tư, công khai, ...
  - Tạo bài viết, tạo bình luận, tạo trang, tạo sự kiện, ...
  - ...
- Phương thức triển khai:

  - Sử dụng Docker
  - Triển khai trên máy chủ vật lý

## 2. Clone project

```bash
git clone ...
```

## 3. Triển khai

> **_NOTE:_** Nếu không phải lần chạy đầu tiên và muốn thay đổi database, cần xóa file `protected/config/dynamic.php` để xóa cấu hình cũ

### 3.1. Triển khai với Docker (Recommended)

#### 3.1.1. Yêu cầu

- [Docker](https://docs.docker.com/get-docker/)
- [Docker compose](https://docs.docker.com/compose/install/)

#### 3.1.2. Cài đặt

##### 3.1.2.1. Build

```bash
docker compose build --no-cache
```

##### 3.1.2.2. Start

- Khởi động dự án

```bash
docker compose up -d
```

- Cấp quyền 777 cho thư mục data

```bash
sudo chmod -R 777 ./db
sudo chmod 777 ./db/*
sudo chmod -R 777 ./db/mysql_data/
sudo chmod 777 ./db/mysql_data/*
```

- Sau khi thực thi câu lệnh trên, cần đợi mysql container khởi động xong. Lúc này dự án vẫn chưa chạy được. Cần thực thi lệnh sau để khởi động dự án:

```bash
docker exec -it caodangytethaibinh composer install
```

##### 3.1.2.3. Stop

```bash
docker compose down
```

### 3.2. Triển khai trên máy chủ vật lý

#### 3.2.1. Yêu cầu

- PHP >= 7.4
- MySQL >= 5.7
- Composer
- Các môi trường Linux cần thiết (được đề cập ở phần [3.2.2.1](#3221-cài-đặt-các-gói-thư-viện-môi-trường-cần-thiết) )

#### 3.2.2. Cài đặt

##### 3.2.2.1. Cài đặt các gói thư viện, môi trường cần thiết

```bash
sudo apt-get update -y
sudo apt-get install -y apache2 php libapache2-mod-php unzip php-cli nano apache2-utils 
sudo apt-get install -y curl wget php-imagick php-curl php-bz2 php-gd php-intl php-mbstring php-mysql php-zip php-apcu php-xml php-ldap php-dom php-simplexml
sudo apt install -y apt-transport-https lsb-release ca-certificates curl dirmngr gnupg
sudo apt-get update -y
sudo apt-get upgrade -y
```

##### 3.2.2.2. Cài đặt Composer

```bash
sudo cd ~
sudo curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
sudo HASH=`curl -sS https://composer.github.io/installer.sig`
sudo php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
sudo composer --version
```

##### 3.2.2.3. Cài đặt MySQL

```bash
sudo apt-get install -y mysql-server
```

##### 3.2.2.4. Start

```bash
sudo rm -rf /var/www/html/*
sudo cp -r * /var/www/html/
sudo chmod -R 777 /var/www/html
sudo chmod 777 /var/www/html/*
sudo service apache2 start
sudo service apache2 restart
```

## 4. Cấu hình

- Truy cập vào đường dẫn [http://localhost](http://localhost) để truy cập vào giao diện web của dự án
- Cấu hình dự án theo các bước trên giao diện web
