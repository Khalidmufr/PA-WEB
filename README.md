# UD HADERAH

**Profil**

UD Haderah adalah platform untuk melakukan penjualan pada toko kayu dengan berbagai kayu, toko yang berada di samarinda.

**Spesifikasi**

- HTML
- PHP
- MySQL
- CSS
- Bootstrap
- JavaScript
- iframe

## Entity Relationship Diagram

Sebelum membuat suatu website pada umumnya kita akan membuat database terlebih dahulu maka di bawah ini akan ada penjelasan dari database kami.

![erd php](https://user-images.githubusercontent.com/120180482/236963811-d47c198f-20c4-48c6-9cf0-60c527beef1c.jpg)


![Logical](https://user-images.githubusercontent.com/120180482/236262844-c41ca4bd-8f08-4e9f-b934-847740d8179c.png)

**Tabel Login** 
- id_login (INT) PRIMARY KEY
- username (VARCHAR(20))
- password (VARCHAR(8))
- nama (VARCHAR(25))
- role (enum)

**Supertype Login**
- admin
- user
- staff

**produk**
- id_produk (INT) PRIMARY KEY
- nama_produk (VARCHAR(25))
- harga (INT)
- stok (INT)
- gambar (TEXT)

**supir**
- id_supir (INT) PRIMARY KEY
- nama_supir (VARCHAR(60))
- id_mobil (INT) FOREIGN KEY

**mobil**
- id_mobil (INT) PRIMARY KEY
- merk (VARCHAR(60))
- plat (CHAR(15))

**pembelian**
- id_pembelian (INT) PRIMARY KEY
- nomor (CHAR)
- alamat (VARCHAR(80)
- jumlah (INT)
- subtotal (INT)
- status (CHAR)
- kode (INT)
- id_produk (INT) FOREIGN KEY
- id_login (INT) FOREIGN KEY
- id_supir (INT) FOREIGN KEY

NOTE : Tabel pembelian merupakan tabel bantu

## Relasi

Setelah mengetahui tipe data dari masing-masing tabel maka selanjutnya adalah relasi antar tabel yang ada di bawah ini :

![Relational_1](https://user-images.githubusercontent.com/120180482/236263240-8c769568-97dd-49d4-8e07-3e8829b2fb3b.png)

one to one :
  - satu supir membawa satu mobil
  - satu mobil dibawa satu supir
  
one to many :
  - satu admin mengedit banyak pembelian
  - banyak pembelian diedit satu admin
  - satu produk dimuat banyak pembelian
  - banyak pembelian memuat satu produk
  - satu user melakukan banyak pembelian
  - banyak pembelian dilakukan satu user
  - satu supir mengantar banyak pembelian
  - banyak pembelian diantar satu supir
  
 many to many :
  - banyak staff mengecek banyak pembelian
  - banyak pembelian mengecek banyak staff



## Use Case Diagram

di bawah ini terdapat use case diagram yang di mana berisi aktor dan alur dari aktor tersebut

![wood](https://user-images.githubusercontent.com/120180482/236963810-1bc1e478-c257-4ddb-a10d-937d5bacdadf.jpg)

Berikut adalah contoh end-to-end use case menggunakan website UD HADERAH, yang berisi role admin, user, dan staff:

1. Use case "Admin Melakukan CRUD Produk/Pembelian/Supir/Mobil"

- Aktor: Admin
- Tujuan: Admin dapat menambah, mengubah, dan menghapus data produk, pembelian, supir dan mobil.
- Alur kerja:
  - Admin masuk ke sistem dan membuka halaman admin.
  - Admin memilih opsi "CRUD Produk/Pembelian/Supir/Mobil".
  - Admin memilih opsi "Tambah Data Produk/Pembelian/Supir/Mobil".
  - Admin memasukkan informasi".
  - Admin memilih opsi "Simpan".
  - Admin memilih opsi "Ubah Data Produk/Pembelian/Supir/Mobil".
  - Admin memilih data Produk/Pembelian/Supir/Mobil yang ingin diubah.
  - Admin memperbarui informasi.
  - Admin memilih opsi "Simpan".
  - Admin memilih opsi "Hapus Data Produk/Pembelian/Supir/Mobil".
  - Admin memilih data Produk/Pembelian/Supir/Mobil yang ingin dihapus.
  - Admin memilih opsi "Hapus".

2. Use case "User Melakukan Transaksi Pembelian"

- Aktor: User
- Tujuan: User dapat membeli produk melalui sistem dan melihat status transaksi mereka.
- Alur kerja:
  - User masuk ke sistem dan membuka halaman transaksi pembelian produk.
  - User memilih jenis produk dan jumlah yang ingin dibeli.
  - Sistem menampilkan total biaya pembelian dan meminta konfirmasi dari user.
  - Sistem memasukkan pembelian ke keranjang.
  - User memilih opsi "Checkout".
  - Sistem menampilkan halaman pembayaran dan meminta user memasukkan informasi pembayaran.
  - User memasukkan informasi pembayaran dan memilih opsi "Bayar".
  - Sistem menampilkan konfirmasi pembayaran kepada user.
  - User dapat melihat status transaksi mereka di halaman lihat pesanan.

3. Use case "Staff Mengatur Pengiriman dan Manajemen Mobil"

- Aktor: Staff
- Tujuan: Staff dapat mengirim pembelian produk yang dipesan oleh user setelah pembayaran telah dikonfirmasi.
- Alur kerja:
  - Staff memverifikasi pembayaran dari user yang telah dilakukan sebelumnya.
  - Apabila pembayaran telah dikonfirmasi, staff memproses pengiriman produk.
  - Staff melakukan pengecekan ketersediaan mobil.
  - Mobil tersedia, staff memilih supir untuk melalukan pengiriman.
  - Sistem mengirimkan notifikasi kepada user bahwa pesanan mereka telah dikirimkan.

Dalam contoh di atas, ketiga use case saling terkait dan membentuk end-to-end use case yang menjelaskan alur kerja lengkap dari awal hingga akhir, melibatkan semua aktor dan alur dalam website UD Haderah.

## Output Web

**1. Landing Page**

- berisi tampilan dari halaman utama seperti dashboard, jenis pelayanan, galeri dan login

- lalu membuka login untuk melihat halaman sesuai role

![Landing Page](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/67914953-42dc-4c8c-a7b5-c85abaf7d2a4)

![Landing Page](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/cfcf60f8-0676-4fe3-ac80-46fa60aba421)

![Landing Page](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/aee42275-a062-4699-9d74-950b59b12916)

**2. Login Admin**

- tampilan admin berisi username, password, masuk dan daftar

- apabila melakukan login sesuai role yaitu admin maka akan masuk ke halaman admin

![Admin](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/1fd318cd-e3c9-45d4-98d7-97a0112233db)
    
**3. Halaman Admin**

- terdapat beranda yang berisi total akun, total pendapatan, total terjual dan total barang yang belum terjual

![Screenshot (121)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/db6a5adc-b063-4711-8e9d-6b239e0de7d9)

- terdapat halaman produk, pembelian, supir dan mobil di sidebar

![Screenshot (122)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/9547e774-7b70-4ccc-9f35-ddb520a754d0)

- terdapat tabel produk yang berisi berbagai jenis kayu beserta nama harga dan aksi untuk mengedit, menambah dan menghapus produk   
    
![Screenshot (123)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/e60dacb3-3e81-46c9-8db8-d90362c7ae88)

- tampilan tambah produk    
    
![Screenshot (124)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/9ba96885-bb31-4df3-abe4-04375b555f16)

- produk berhasil bertambah
    
![Screenshot (125)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/67d7064e-fc28-41dc-b3f6-058d9e213650)

 - tampilan mengedit produk
    
![Screenshot (126)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/5a830966-d5e9-4f83-bb32-ec98fe026263)

- produk berhasil diubah   
    
![Screenshot (127)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/ae70301e-97d9-4c97-8d5e-7090ee498268)

![Screenshot (128)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/da1d2c70-d988-4a6d-957d-0af8972a6889)

- terdapat tabel pembelian yang berisi data pelanggan beserta produk yang dibeli    
    
![Screenshot (130)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/ceef0d64-3fd3-459c-b4a8-ed1ec2abca17)

- terdapat tabel supir yang berisi data supir   
    
![Screenshot (131)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/2e6b4b57-ce0d-4f4b-aa98-5310629c36df)

- menambah supir baru  
    
![Screenshot (132)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/5efaf80a-81bf-40ee-b53d-45d04f9c5879)

- supir berhasil ditambah    
    
![Screenshot (133)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/71bd8f83-a7a9-41e3-8a51-46b45a9a0584)

- tampilan mengedit supir    
    
![Screenshot (134)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/660eae5f-5527-48a7-ba1a-e22358ccc2e6)

- supir berhasil diubah    
    
![Screenshot (135)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/9635aaf6-9dab-43a5-9a44-22769f3c7e0c)

![Screenshot (136)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/1901b907-f924-4407-acd4-629cf31ccaf9)

- terdapat tabel mobil yang berisi merk dan plat   
    
![Screenshot (137)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/b37c5a48-db2d-44c4-98b1-64cf9422cc2c)

- tampilan mengedit mobil   
    
![Screenshot (139)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/9440f297-85f1-436b-bc4f-0323dd150161)

- mobil berhasil ditambah    
    
![Screenshot (140)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/7e6287b1-6308-453e-9500-3cfafa61b42f)

**4. Login User**

- tampilan register berisi nama, username, password, masuk, login

- sebelum melakukan login, user wajib membuat register terlebih dahulu untuk mendapat akses login ke halaman user

![Screenshot (114)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/056f9b32-d382-43e3-aacc-6ffaeb084f87)
 
- tampilan admin berisi username, password, masuk dan daftar

- apabila melakukan login sesuai role yaitu user maka akan masuk ke halaman user
 
![Screenshot (110)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/8a7cdd04-f407-48df-bf23-56da105b01bb)

**5. Halaman User**

- terdapat beranda, produk, keluhan, lokasi, checkout dan tampilan user

![Screenshot (111)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/c27d3585-e0c1-4d0c-8020-1f20559b090c)

- tampilan produk berisi nama produk, gambar, harga, stok dan lihat produk

![Screenshot (112)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/fb604b51-8482-48f8-b6d1-b928f8b785c5)

- terdapat beli produk yang berisi nama produk, gambar, nomor hp, alamat jumlah barang dan masukkan barang

![Screenshot (115)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/39f8f73c-2200-409d-844e-7f130ce7c497)

- produk berhasil masuk ke keranjang checkout

![Screenshot (114)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/056f9b32-d382-43e3-aacc-6ffaeb084f87)

- tampilan checkout berisi produk yang telah dibeli

![Screenshot (116)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/2f537c48-5352-402a-9cc1-69d327eedaf3)

- produk berhasil dibeli

![Screenshot (117)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/652df067-90f5-48cf-bae4-e6f1f082e3b1)

- tampilan lokasi dari website UD Haderah

![Screenshot (118)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/28b6275e-f732-4536-b6c6-b0a080850c71)

- terdapat dropdown dari tampilan user yaitu nama, pesanan, dan log out

![Screenshot (119)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/896f51e2-22f7-4cfe-a65f-bcb805a7ce72)

- apabila menekan pesanan maka akan muncul tampilan dari pembelian yang terlihat belum terkirim

![Screenshot (120)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/286b887c-4091-4873-996d-f0444773dbc2)

- tampilan pesanan apabila sudah diantar oleh supir dan ada yang tertolak

![Screenshot (154)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/2eceed3b-431f-4ef2-bed0-51ef9d08fc9b)

- terdapat menu keluhan yang berfungsi untuk menampilkan keluhan atas ketidakpuasan user terkait toko ini

![Screenshot (155)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/f1485127-eb50-41cc-9821-7aa47769fa8a)

- keluhan berhasil dikirim

![Screenshot (156)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/3cbdf3f5-40a6-4593-8271-7a3bd7121436)

- keluhan masuk ke halaman riwayat yang dimana user bisa melihat isi tersebut

![Screenshot (157)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/0e270202-a90d-42a5-84ac-1d90891c949e)

**6. Login Staff**

- tampilan staff berisi username, password, masuk dan daftar

- apabila melakukan login sesuai role yaitu staff maka akan masuk ke halaman staff

![Staff](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/0f09cd80-cac5-4e02-9b7d-a0eac347b916)

**7. Halaman Staff**

- terdapat beranda yang berisi total akun, total pendapatan, total terjual dan total barang yang belum terjual

![Screenshot (144)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/8769bcdc-d0ca-4fd7-80ea-ba95e3d294d7)

- terdapat tabel pengiriman yang berisi tabel pembelian pengiriman dan supir

![Screenshot (145)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/41da96af-5c34-439b-808e-2e8230c9b861)

- menambahkan supir untuk tabel pengiriman

- supir berhasil mengisi untuk pengiriman

![Screenshot (146)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/e6a15002-5997-4a76-9858-282e5b3f5fe3)

![Screenshot (147)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/8d94fac0-e73f-4647-9d47-895b1783094c)

- tampilan membatalkan pengiriman 

![Screenshot (148)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/9deee09e-1dd5-4380-952c-ac5cbeab44db)

- menambahkan supir untuk tabel pengiriman

- supir berhasil mengisi untuk pengiriman

![Screenshot (149)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/45833f00-c226-478f-8e60-889915b96eb1)

![Screenshot (150)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/852d984a-8f2c-4e6e-a322-9382fd4d06cb)

- terdapat tabel mobil yang berisi jenis plat untuk menandai mobil yang digunakan dan supir

![Screenshot (151)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/fc9f7197-2b5b-46a0-843c-cdaff8a6943d)

![Screenshot (152)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/8b16cccd-a463-4121-a0da-ead3f7e26fc7)

- gagal menambahkan supir karena mobil telah digunakan supir lain

![Screenshot (153)](https://github.com/romyhakimwardana/gambar-gratis-2023/assets/120180482/c63d4cda-e6e0-4a63-bf2f-f2da3815e62c)

**Anggota**
- Muhammad Rizq Saputra
- Romy Hakim Wardana
- Khalid Mu'afi Rabbani
