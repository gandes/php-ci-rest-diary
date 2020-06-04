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

**[POST] Register** :  ```/auth/register?username=asd&email=afsdf%40ga.com&password=sdggg&fullname=gagaga&birthday=2020-02-05```
**[POST] Get All Diary** :  ```/diary/get_all?user_id=6&token=$2y$10$7Sc4hvPKtPiMpXHsEuxudOKvKti0S48J7RgCGMQg1Ncq4QJWGyBhS```
**[POST] Get Quartal Diary** :  ```/diary/get_all?user_id=6&token=$2y$10$7Sc4hvPKtPiMpXHsEuxudOKvKti0S48J7RgCGMQg1Ncq4QJWGyBhS&year=2020&quartal=Q2```
**[POST] Create Diary** :  ```/diary/create?user_id=6&diary=Post%202&diary_date=2020-06-06&token=$2y$10$7Sc4hvPKtPiMpXHsEuxudOKvKti0S48J7RgCGMQg1Ncq4QJWGyBhS```


***Example :*** `<http://localhost/diary/index.php/diary/get_all>`
