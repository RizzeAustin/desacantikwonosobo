# desacantikwonosobo
Web Lokal untuk entri dan update data desa cantik wonosobo

PANDUAN INSTAL WEB LOKAL DESA CANTIK

Web desa cantik dibuat menggunakan php 8 dengan framework Laravel 8 dan dijalankan secara lokal menggunakan XAMPP 3.3.0 (Compiled: Apr 6 2021) serta database mysql didalamnya.

1.	Download semua file pada drive (s.stis.ac.id/WebDCWonosobo)
2.	Extract file ‘xampp-portable-windows-x64-8.0.13-0-VS16.zip’
3.	Pindahkan folder ‘xampp’ hasil extract ke drive C: PC Anda
4.	Replace file ‘php.ini’ pada folder ‘C:xampp/php/’ dengan file ‘php.ini’ yang telah didownload sebelumnya
5.	Jalankan XAMPP control panel dan start modul apache dan mysql
6.	Jika modul tidak bisa dijalankan, coba install file ‘VC_redist.x64.exe’ dan ‘VC_redist.x86.exe’ yang telah didownload sebelumnya
7.	Jika modul apache dan mysql pada XAMPP control panel sudah dapat dijalankan, buka alamat berikut pada browser untuk menyiapkan databasenya : http://localhost:80/phpmyadmin/
8.	Buat database baru dengan nama ‘desacantik’ dengan collation ‘utf8mb4_general_ci’
9.	Import file ‘desacantik.sql’ yang telah didownload sebelumnya pada database tersebut
10.	Extract file ‘desacantik v106.zip’
11.	Pindahkan folder ‘desacantik’ hasil extract ke folder ‘C:xampp/htdocs/’
12.	Web Desa cantik dapat dibuka pada alamat : http://127.0.0.1:80/desacantik 
13.	username: admin, password: bukanadmin

Tambahan:
1.	Fitur reset password membutuhkan email untuk dapat digunakan, PC juga harus terkoneksi dengan internet agar web bisa mengirimkan link reset password ke email user
2.	Jika menggunakan gmail, karena masalah keamanan dari google, email yang dikirimkan oleh web akan masuk ke folder spam

