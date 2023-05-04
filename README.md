**#Tutorial Website UD HADERAH**

|                              |  |                              | |                              |  |                              | |                              |  |                              | |                              | |                              | |                              |   |                              | |                              | |                              | |                              |

**## Entity Relationship Diagram**

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

**## Relasi**

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
