# Start requirements

## Xóa file `protected/config/dynamic.php` nếu có

## Start docker

```bash
docker compose up -d
```

## Cấp quyền 777 cho thư mục data

```bash
sudo chmod -R 777 ./db
sudo chmod 777 ./db/*
sudo chmod -R 777 ./db/mysql_data/
sudo chmod 777 ./db/mysql_data/*
```
