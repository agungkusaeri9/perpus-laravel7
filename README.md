Pastikan laptop sudah terinstall xampp (php 7.2 ++) & composer.

Langkah-langkah installasi.
1. composer install
2. copy file .env.example menjadi .env dan edit database,user,password
3. kemudian ketik php artisan key:generate di terminal directory project
4. kemudian ketik php artisan migrate --seed
5. Setelah itu jalankan serve nya, dengan mengetikan php artisan serve
6. dan di browser dan untuk Akun admin isikan email = administrator@gmail.com dan password = administrator
