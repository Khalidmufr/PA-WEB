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

![WhatsApp Image 2023-05-10 at 21 36 35](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/a15e9c50-b8bb-49c6-aa74-dea3964d676b)

![WhatsApp Image 2023-05-10 at 21 36 36](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/37567608-70d3-4236-bcc6-db7e12d4a19c)

![WhatsApp Image 2023-05-10 at 21 36 36](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/e978e362-b4db-41f6-ba73-691efb60bed3)


**2. Login Admin**

- tampilan admin berisi username, password, masuk dan daftar

- apabila melakukan login sesuai role yaitu admin maka akan masuk ke halaman admin

![WhatsApp Image 2023-05-10 at 21 13 09](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/14cf8208-d1d0-4333-85b0-7efa67a57156)
    
**3. Halaman Admin**

- terdapat beranda yang berisi total akun, total pendapatan, total terjual dan total barang yang belum terjual

![Screenshot (121)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/f5654333-8da8-41e4-9b54-9938635fe1b9)

- terdapat halaman produk, pembelian, supir dan mobil di sidebar

![Screenshot (122)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/3da5fbf6-c813-455f-a6ef-d6abc26a1b36)

- terdapat tabel produk yang berisi berbagai jenis kayu beserta nama harga dan aksi untuk mengedit, menambah dan menghapus produk   
    
![Screenshot (123)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/6190f584-2de4-4df3-b066-85cf5a7a0c12)

- tampilan tambah produk    
    
![Screenshot (124)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/2b395b03-b2ae-47dd-99a1-e4f5d781ab20)

- produk berhasil bertambah
    
![Screenshot (125)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/9511d178-c77e-4352-84c1-5d26881c436c)

 - tampilan mengedit produk
    
![Screenshot (126)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/2a158add-9ebe-4d63-8b41-5b8a5cffe4d6)

- produk berhasil diubah   
    
![Screenshot (127)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/eb0f65e9-8fa5-4a69-9afa-11d17fb511e8)

![Screenshot (128)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/af349ef2-cfa3-436e-94dc-a5b590f3ebfe)

- terdapat tabel pembelian yang berisi data pelanggan beserta produk yang dibeli    
    
![Screenshot (130)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/72a91d48-1fd0-42bf-a4fa-6ea40c41c149)

- terdapat tabel supir yang berisi data supir   
    
![Screenshot (131)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/84148e00-3e9e-41dc-ba7c-912b357eb5f3)

- menambah supir baru  
    
![Screenshot (132)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/a597048f-3425-4e4d-809b-432d2dd8961c)

- supir berhasil ditambah    
    
![Screenshot (133)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/7439defe-71a7-4a48-9776-d57221111c8c)

- tampilan mengedit supir    
    
![Screenshot (134)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/cbdfd47a-243b-4382-95b7-f45fc14e54e5)

- supir berhasil diubah    
    
![Screenshot (135)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/77a1ec53-75e3-4c25-9801-9f8c34eadefc)

![Screenshot (136)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/3cd9144e-8283-4bd7-a4b7-3aaaa3d742c5)

- terdapat tabel mobil yang berisi merk dan plat   
    
![Screenshot (137)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/1e86f12a-957b-4e3b-8287-225220811561)

- tampilan mengedit mobil   
    
![Screenshot (138)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/1b4dce12-bf19-4038-a678-585b93cb3c1c)

- mobil berhasil ditambah    
    
![Screenshot (140)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/366fd75c-e5ff-4285-850c-20d921b08b31)

**4. Login User**

- tampilan register berisi nama, username, password, masuk, login

- sebelum melakukan login, user wajib membuat register terlebih dahulu untuk mendapat akses login ke halaman user

![Screenshot (140)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/5861b035-39fb-46c3-856b-4cbe7fc30b75)
 
- tampilan admin berisi username, password, masuk dan daftar

- apabila melakukan login sesuai role yaitu user maka akan masuk ke halaman user
 
![Screenshot (110)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/17ec52d8-06b0-473c-a190-c2b389fd7f73)

**5. Halaman User**

- terdapat beranda, produk, keluhan, lokasi, checkout dan tampilan user

![Screenshot (111)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/4ced6a71-4591-44b2-83ac-1d903d92361e)

- tampilan produk berisi nama produk, gambar, harga, stok dan lihat produk

![Screenshot (112)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/b5fe9140-6478-42fe-a5c3-bde627d07c5d)

- terdapat beli produk yang berisi nama produk, gambar, nomor hp, alamat jumlah barang dan masukkan barang

![Screenshot (115)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/a92aca97-da9f-41a9-b004-47c05598a200)

- produk berhasil masuk ke keranjang checkout

![Screenshot (114)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/622da588-fa24-48fa-a481-05f5649828e9)

- tampilan checkout berisi produk yang telah dibeli

![Screenshot (116)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/8846dca9-a774-4eae-b6d4-b7d29017ceab)

- produk berhasil dibeli

![Screenshot (117)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/a29e91a7-d0aa-48b4-ae84-9187b1dc3966)

- tampilan lokasi dari website UD Haderah

![Screenshot (118)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/492c9417-bd45-4727-bfc8-f17e8c3d57c3)

- terdapat dropdown dari tampilan user yaitu nama, pesanan, dan log out

![Screenshot (119)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/a0bedf4f-fa12-4a0c-887d-81d56777da3e)

- apabila menekan pesanan maka akan muncul tampilan dari pembelian yang terlihat belum terkirim

![Screenshot (120)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/b2f3932d-ad0f-4d04-93fc-a47910c95881)

- tampilan pesanan apabila sudah diantar oleh supir dan ada yang tertolak

![Screenshot (154)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/8eed9fe4-f289-4721-ade1-c3bb740d1ab1)

- terdapat menu keluhan yang berfungsi untuk menampilkan keluhan atas ketidakpuasan user terkait toko ini

![Screenshot (155)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/b56b84ce-dba0-4a38-87ca-36f95e9d8e30)

- keluhan berhasil dikirim

![Screenshot (156)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/d285a728-433e-4b30-b4f3-cd2d8dc815c9)

- keluhan masuk ke halaman riwayat yang dimana user bisa melihat isi tersebut

![Screenshot (157)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/9b740ee1-9d73-49fe-ba02-1c22213c5a5f)

**6. Login Staff**

- tampilan staff berisi username, password, masuk dan daftar

- apabila melakukan login sesuai role yaitu staff maka akan masuk ke halaman staff

![WhatsApp Image 2023-05-10 at 21 13 10](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/23a9f1ca-28dd-430e-801c-26972e5f626d)

**7. Halaman Staff**

- terdapat beranda yang berisi total akun, total pendapatan, total terjual dan total barang yang belum terjual

![Screenshot (144)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/86352b58-7c27-463e-a58b-0454bc439546)

- terdapat tabel pengiriman yang berisi tabel pembelian pengiriman dan supir

![Screenshot (145)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/a9c30638-18d5-4894-ba86-904e24f189ca)

- menambahkan supir untuk tabel pengiriman

- supir berhasil mengisi untuk pengiriman

![Screenshot (146)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/008dfba9-5596-486e-9f1d-2d1993af8c5a)

![Screenshot (147)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/164a5231-b829-4eb7-bf20-693c6bd13403)

- tampilan membatalkan pengiriman 

![Screenshot (148)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/985effe1-4bae-484f-ab61-e0539b4b8b14)

- menambahkan supir untuk tabel pengiriman

- supir berhasil mengisi untuk pengiriman

![Screenshot (149)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/4433ee29-c8b4-432e-99f8-85d3cb8ec80d)

![Screenshot (150)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/f4e20e54-d3b6-4d33-a2e0-7f98c4e71334)

- terdapat tabel mobil yang berisi jenis plat untuk menandai mobil yang digunakan dan supir

![Screenshot (151)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/b3a1cf40-55fe-49df-8af9-8e0580d62959)

![Screenshot (152)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/41f114cc-df77-4b4a-bbf1-e55cbfde0388)

- gagal menambahkan supir karena mobil telah digunakan supir lain

![Screenshot (153)](https://github.com/romyhakimwardana/PA-WEB/assets/120180482/027a2042-3d5f-4fbe-8d39-f558c2229080)

**Anggota**
- Muhammad Rizq Saputra
- Romy Hakim Wardana
- Khalid Mu'afi Rabbani
