## Test Program Fastprint

cara installasi program sederhana
menggunakan laravel versi 10.\*

1. Clone dari repository github
2. jalankan composer install di terminal

```sh
composer install
```

3. copy file .env dari .env.example
4. ubah nama database menjadi "test_programmer_fastprint"
5. generate key dengan perintah

```sh
php artisan key:generate
```

6. lalu migrate database seeder / factori dengan perintah

```sh
php artisan migrate:fresh --seed
```

7. jalankan aplikasi dengan perintah

```sh
php artisan serve
```
