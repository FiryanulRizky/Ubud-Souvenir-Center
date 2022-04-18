# Ubud Souvenir Center Project v1.0
Projek Website dan Aplikasi Mobile (Sistem Analisis Bisnis berbasis E-Marketplace Penjualan Souvenir Pasar Seni Ubud Gianyar, Bali). 

Skripsi Penelitian (Implementasi Algoritma Apriori)
 - Muhammad Firyanul Rizky (Periode 2017 - 2021) - Fakultas Mipa - Prodi Informatika - Universitas Udayana
 - Tanggal Penelitian : 27 Mei 2020 - 30 Agustus 2021.
 - Dibawah bimbingan : Bapak Ida Bagus Made Mahendra, S.Kom., M.Kom. dan Bapak I Gusti Agung Gede Arya Kadyanan, S.Kom., M.Kom.
 - Berikut adalah [Publikasi Jurnal](https://ojs.unud.ac.id/index.php/JLK/article/view/78212) yang berkaitan dengan penelitian ini.

# Catatan
- Projek ini adalah projek tugas akhir dan demi melindungi keamanan data dan privasi intelektual, file pemrograman inti yang mengandung proses algoritma tidak disertakan dalam direktori ini,
- File pemrograman Backend php, javascript, html, css yang diupload pada web server telah dikumpulkan pada satu folder public_html
- File database terdapat pada folder database_sql
- File koneksi database, terdapat di /db/koneksi.php, dan /generator_qrcode/config.php.
- Projek telah di hosting dengan domain https://ubud-souvenir-center.my.id.
- Projek ini dilindungi dari segala bentuk plagiasi, cek sertifikat HAKI disini http://shorturl.at/uIL36.
- Selengkapnya Cek Panduan Penggunaan Aplikasi disini : http://shorturl.at/bxM56.
- Disediakan aktivitas Demo/Tester untuk mencoba segala fitur yang ada pada aplikasi, 
Silahkan baca panduan aplikasi pada link diatas, unduh aplikasi, dan jalankan aplikasi sebagai administrator.
  - Pilih Toko : Tester Projek (KDTK32)
  - Username : tester
  - Password : 123
  
Saran, masukan sangat saya terima dan untuk keperluan diskusi dipersilahkan untuk mengirim email ke firyan2903@gmail.com.

# Development Tools
Aplikasi dibuat dengan model hybrid (Android SDK 19 (KitKat)- SDK 31 (Android 12))
1. Frontend Mobile (Android Studio Arctic Fox 2020.3.1, Android Gradle Plugin Version 7.0.3, Gradle Version 7.2) 
   - Kotlin 1.5.31
   - javascript, html, css
   - WebView
2. Backend (Native Website)
   - PHP 8.1.4
   - DBMS Mysql

# Fitur Sistem Aplikasi
1. E-Marketplace 
2. E-Payment Gateway (Beta)
3. QR Generator & QR Scanner
4. Manajemen Stok
5. Analisa Penjualan dengan Algoritma Apriori
6. Hasil Analisa Pola Penjualan dalam bentuk Visualisasi
7. Bar Diagram Produk Terlaris
8. Pie Diagram Persentase Penjualan
9. Linechart Pendapatan Bulanan
10. Clear Cache otomatis setelah aplikasi ditutup (Mencegah Pembengkakan Ukuran File dan Menghemat Memori Perangkat)
11. Website Super Admin sebagai Sistem Monitoring & Evaluasi

# Modelling System
Berikut adalah dokumentasi untuk modelling sistem :
1. Mockup : [e-marketplace](https://drive.google.com/drive/folders/1WBFzE2YAQ8WsPF7UayUy6bRGFkJZaN3Y?usp=sharing), [administrator](https://drive.google.com/drive/folders/1EdIAMbJu9IhiWog2whf7ibiy-lLk6tmr?usp=sharing), [Super Admin](https://drive.google.com/drive/folders/1YFDoH4rlG5Kceqkr4-fVj99VHSPhXDBo?usp=sharing) (klik link tulisan berwarna biru untuk detail lanjutan).
2. Activity Diagram : [klik disini](https://drive.google.com/drive/folders/10QUiOtDSjGgP1F_X1E5Ot-p14wKO632n?usp=sharing).
3. Sequence Diagram : [klik disini](https://drive.google.com/drive/folders/1BNBsLCgRZDk0ysDtOmoKAP6fRl8sh2Ng?usp=sharing).
4. DFD Diagram : [klik disini](https://drive.google.com/drive/folders/1qTNHHHGpUhYg2FZj5NIIjUEgSsZCTNwI?usp=sharing).
5. Database Relasional/Physical Diagram : [klik disini](https://drive.google.com/drive/folders/1-atszlZ2d_SM2c5dfiF_Fsmr4AuqbpST?usp=sharing).

<b>6. Diagram Infrastruktur Sistem</b>

![arsitektur sistem 2](https://user-images.githubusercontent.com/60762912/163806514-f90539f4-94d6-41f2-88ad-f15b53bd4e31.jpg)

<b>7. Usecase Diagram</b>

![1 Usecase Administrator](https://user-images.githubusercontent.com/60762912/163801981-a19006d1-59bf-47d4-b13b-e8d3b338a2cf.jpg)

<b>8. Class Diagram</b>

![6 UML Class Diagram](https://user-images.githubusercontent.com/60762912/163806665-fcc6d167-c9df-44d7-89f0-dad9f0cde4fb.png)
<hr>

# Antarmuka Aplikasi
![1](https://user-images.githubusercontent.com/60762912/139584342-631b0e3d-d506-41e6-87a6-71a8e4e01fa0.jpg)

![2](https://user-images.githubusercontent.com/60762912/139584360-ccdd7b16-d4d9-431c-b632-981a4e425b38.jpg)

![3](https://user-images.githubusercontent.com/60762912/139584450-de0728f9-6674-47fb-aaa2-8122e4e970a9.jpg)

![4](https://user-images.githubusercontent.com/60762912/139584461-d49c1eb7-846e-4713-9c25-3a57c67081b6.jpg)

![5](https://user-images.githubusercontent.com/60762912/139584489-206be7c4-4d52-4d3d-b23e-0d6cf2b50886.jpg)

![6](https://user-images.githubusercontent.com/60762912/139584557-fc9fd2a8-6dd7-4329-ac12-f18a3b530d8c.jpg)

![7](https://user-images.githubusercontent.com/60762912/139584591-9d69f7e7-a94d-4ee1-b714-af6dd53d4f2f.jpg)

![8](https://user-images.githubusercontent.com/60762912/139584598-01ce557e-2290-4163-ae77-958362e92193.jpg)

![9](https://user-images.githubusercontent.com/60762912/139584600-a6ab4b59-f5f2-419c-a11f-196a2fa02477.jpg)

![10](https://user-images.githubusercontent.com/60762912/139584604-0438e35c-cde3-4440-bb3d-ddbd0db23aae.jpg)

![11](https://user-images.githubusercontent.com/60762912/139584609-78435a4f-6a91-485a-8d88-6694f6c08c8b.jpg)

![12](https://user-images.githubusercontent.com/60762912/139584613-099ca783-63a1-4e06-9ca1-c4cda2c1181a.jpg)

![13](https://user-images.githubusercontent.com/60762912/139584615-2f66be85-67dd-4f29-9541-6ecc6b179162.jpg)

![14](https://user-images.githubusercontent.com/60762912/139584622-68ad4db1-77cb-483c-8b75-22a4dd8b2e45.jpg)

![15](https://user-images.githubusercontent.com/60762912/139584627-27395ce3-b87f-416c-85db-5eff953823c2.jpg)

![16](https://user-images.githubusercontent.com/60762912/162623039-2315c6bc-bfd9-4cf6-b139-759d923adaad.jpg)

![17](https://user-images.githubusercontent.com/60762912/139584639-930a27d2-8d61-4ffc-a337-c07e9839ceef.jpg)

![18](https://user-images.githubusercontent.com/60762912/139584650-32592c92-19f9-411d-8a69-ccb9157de0e0.jpg)

![19](https://user-images.githubusercontent.com/60762912/139584653-ef2dee92-a3e9-4b5e-9c20-c763b76eb388.jpg)

![20](https://user-images.githubusercontent.com/60762912/139584666-a61d1ef4-dfe5-4385-bc30-6b53119b9519.jpg)

![21](https://user-images.githubusercontent.com/60762912/139584670-894e074a-562b-4118-888e-8af449c4a56a.jpg)

![22](https://user-images.githubusercontent.com/60762912/139584671-172f10aa-0ffd-4299-96e0-1b7e5558f5e4.jpg)

![23](https://user-images.githubusercontent.com/60762912/139584673-02b21d9b-ee93-41bb-922b-42904fcc4c5f.jpg)

# Interface Website Super Admin
![1 Login](https://user-images.githubusercontent.com/60762912/139585434-cd51dc87-dd48-4ff0-9f5f-b035fb07bf1f.png)

![2 Dashboard](https://user-images.githubusercontent.com/60762912/139585933-9b3064ee-e404-4881-b956-0b1c2d710031.png)

![3 Panel Navigasi](https://user-images.githubusercontent.com/60762912/139585453-450271fc-3171-45d6-8919-67369b9bdd10.png)

![3_halaman pola hapus](https://user-images.githubusercontent.com/60762912/139585746-1e0bff17-2de7-4064-99e5-88e6840b32f7.PNG)

![4 Status Resesi](https://user-images.githubusercontent.com/60762912/139585779-8a9ccbe7-07a7-4368-92a4-a4226fd4de2c.png)

![4 2 Notif](https://user-images.githubusercontent.com/60762912/139585789-91bcd31c-b502-4986-93b6-b835eecc320f.png)

![4 3 Pola Itemset List Filter](https://user-images.githubusercontent.com/60762912/139585811-b0730206-34e9-483c-84b6-594881aeb0ef.png)

![4 4 Pola Itemset Tabel](https://user-images.githubusercontent.com/60762912/139585819-da8ffe1e-d2f6-4426-9467-f18003d0ae70.png)

![5 Peninjauan Penghapusan](https://user-images.githubusercontent.com/60762912/139585867-d9b63246-91df-421d-9f87-12723c9ffc70.png)

![5 2 Proses Penghapusan](https://user-images.githubusercontent.com/60762912/139585884-a3c21138-b2de-4303-8c27-a5fe79fa03ef.png)

![5 3 Proses Penghapusan](https://user-images.githubusercontent.com/60762912/139585886-9d4484a1-90bc-453e-91b7-1ff18e433d6d.png)

![5 4 Proses Penghapusan](https://user-images.githubusercontent.com/60762912/139585889-fe57c17f-eca0-4743-a185-03d4caa318f4.png)

![6 Testi Kritik](https://user-images.githubusercontent.com/60762912/139585894-12548181-4f68-4a2d-9913-8aa1f5cc5b6f.png)
