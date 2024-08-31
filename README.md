<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 🌳 PEKAN IT: CLEAN APP

## 🌻 Deskripsi

CleanApp merupakan platform yang menjembatani semua orang dapat berkontribusi untuk merawat bumi. Bisa melalui awarness (CleanUp), melalui pembiayaan (CleanFund), dan melalui aksi (CleanAct).

## ⚡ Teknologi

-   [PHP 8.2](https://php.net/) : Bahasa Pemrograman
-   [Laravel 10](https://laravel.com/) : Framework
-   [Spatie](https://spatie.be/docs/laravel-permission/v6/introduction) : Role-Permission Control
-   [MySQL](https://www.mysql.com/) : Database
-   [Midtrans](https://midtrans.com/) : Payment Gateway

## 🚩 Cara Menjalankan

1. Clone repository ini dengan perintah

```git
git clone https://github.com/bloomingbug/clean-app.git
```

2. Masuk ke direktori aplikasi dengan perintah

```
cd clean-app
```

3. Install dependency

```
composer install
npm install
```

4. Salin file .env.example menjadi .env dengan perintah

```
cp .env.example .env
```

5. Sesuaikan konfigurasi aplikasi, database, payment gateway, dll. pada file .env sesuai dengan environment yang akan digunakan

6. Jalankan perintah

```
php artisan key:generate
php artisan storage:link
```

6. Run Migration & Database Seeder

```
php artisan migrate --seed
```

8. Jalankan nodejs

```
npm run dev
```

9. Jalankan php local development server

```
php artisan serve
```

10. Aplikasi dapat diakses melalui http://localhost:8000

## 👨‍💻 Kontributor

-   [Tarmuji (Team Lead)](https://www.linkedin.com/in/tarmuji-tarmuji/)
-   Wildi (System Analyst)
-   Jasmin (Dokumentator)
-   Fajar Maulana (Backend)
-   M. Fahri Salam (Frontend)
