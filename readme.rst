###################
Rest API with CodeIgniter 3
###################

Rest API ini mengenai Diari.

*******************
How to Deploy
*******************
Requirement: 

1. CodeIgniter 3 di `CodeIgniter Downloads <https://codeigniter.com/download>`.
2. XAMPP (PHP >=5.6 or 7.2.*) di `XAMPP Downloads <https://www.apachefriends.org/download.html>`.

Run:

1. Running XAMPP

Setup Projek:

1. Masuk ke direktori **htdocs** instalasi XAMPP, biasanya di ```C:/xampp/htdocs```
2. Clone atau Download repository ini ```git clone https://github.com/gandes/php-ci-rest-diary.git```
3. Ubah nama folder sesuai yang diinginkan

Setup Database:

1. Buka url ```http://localhost/phpmyadmin``` pada browser
2. Buat database ```diary_db```
3. Import database ```db/diary_db.sql``` dan klik *Go*
4. Masuk ke directori ```application/config/database.php```
5. Sesuaikan konfigurasi sesuai dengan yang diinstall, **default** (host: localhost, username: root, password:<kosong>, database:diary_db)

*******************
API Dokumentasi
*******************

Attempt | #1 | #2 | #3 | #4 | #5 | #6 | #7 | #8 | #9 | #10 | #11
--- | --- | --- | --- |--- |--- |--- |--- |--- |--- |--- |---
Seconds | 301 | 283 | 290 | 286 | 289 | 285 | 287 | 287 | 272 | 276 | 269



/auth/register => asdasd

**Example :** `<http://localhost/diary/index.php/diary/get_all>`
