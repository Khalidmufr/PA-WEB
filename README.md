# Tutorial Website - UD HADERAH

## Entity Relationship Diagram

Sebelum membuat suatu website pada umumnya kita akan membuat database terlebih dahulu maka di bawah ini akan ada penjelasan dari database kami.

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

![wood](https://user-images.githubusercontent.com/120180482/236581278-3fac73f7-9daa-4884-975c-9e679f70e244.jpg)

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

3. Use case "Staff Mengirim Pesanan"

- Aktor: Staff
- Tujuan: Staff dapat mengirim pembelian produk yang dipesan oleh user setelah pembayaran telah dikonfirmasi.
- Alur kerja:
  - Staff memverifikasi pembayaran dari user yang telah dilakukan sebelumnya.
  - Apabila pembayaran telah dikonfirmasi, staff memproses pengiriman produk.
  - Staff melakukan pengecekan ketersediaan mobil.
  - Mobil tersedia, staff melalukan pengiriman.
  - Sistem mengirimkan notifikasi kepada user bahwa pesanan mereka telah dikirimkan.

Dalam contoh di atas, ketiga use case saling terkait dan membentuk end-to-end use case yang menjelaskan alur kerja lengkap dari awal hingga akhir, melibatkan semua aktor dan alur dalam website UD Haderah.
