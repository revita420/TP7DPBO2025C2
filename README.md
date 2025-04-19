# Janji
Saya Syahraini Revita Puri dengan NIM 2301895 berjanji mengerjakan TP7 DPBO dengan keberkahan-Nya, maka saya tidak akan melakukan kecurangan sesuai yang telah di spesifikasikan, Aamiin

# Desain Program
Program ini adalah sistem manajemen toko kue "Sweet Bakery" yang diimplementasikan dengan PHP dan MySQL. Sistem ini mengelola data kategori produk, produk, dan pesanan dengan antarmuka web yang memungkinkan pengguna untuk melihat, menambah, mengedit, dan menghapus data.


**1.Database(db_sweetbakery)**: Berfungsi sebagai penyimpanan data untuk kategori, produk, dan pesanan


**2. Class**:

- Berisi class - class PHP yang menangani operasi CRUD
  - `DB.php` : Pengelolaan koneksi database
  - `Kategori.php` : Operasi data kategori
  - `Produk.php` : Operasi data produk
  - `Pesanan.php` : Operasi data pesanan


**3. Main PHP Files**:

- File - file utama yang berfungsi sebagai pengendali alur program (perantara antara class dan view)
  - `index.php` : Halaman home
  - `kategori.php` : Pengelolaan kategori
  - `produk.php` : Pengelolaan produk
  - `pesanan.php` : Pengelolaan pesanan


**4. View**:

- Berisi template dan file - file tampilan untuk :
  - `template/` : Header dan footer yang digunakan di semua halaman
  - `kategori/` : Tampilan untuk manajemen kategori
  - `produk/` : Tampilan untuk manajemen produk
  - `pesanan/` : Tampilan untuk manajemen pesanan


**5. Proses Pembuatan Pesanan:**

**a. Input data pesanan**: 
- User memilih produk dari daftar yang tersedia
- Memasukkan nama pelanggan dan jumlah pesanan
- Sistem menghitung total harga secara otomatis (jumlah * harga satuan)

**b. Validasi dan pemrosesan pesanan:**
- Sistem memeriksa ketersediaan stok produk
- Jika stok mencukupi, pesanan disimpan sekaligus mengurangi stok
- Jika stok tidak mencukupi, sistem akan menampilkan pesan error
  
![tp7 drawio (1)](https://github.com/user-attachments/assets/9effa3a7-472f-42d6-9207-3e46e6158ae3)

# Alur Program
**1.Client Browser -> Main PHP files:**
- Browser mengirim HTTP Request ke file PHP utama
- Request berisi permintaan untuk melihat, menambah, mengubah, dan menghapus data

**2.Main PHP files -> Class Models:**
- File PHP utama memanggil method dari class yang sesuai
- Contoh: `kategori.php` memangil `Kategori -> getAll()` untuk mendapatkan daftar kategori

**3. Class <-> Database:**
- Class melakukan operasi baca/tulis ke database
- Query SQL dijalankan dan hasilnya dikembalikan ke class

**4.Main PHP files -> View:**
- File PHP utama memuat file view yang sesuai
- Data dari class diteruskan ke view untuk ditampilkan

**5.View -> Main PHP files:**
- Form di view dikirim(submi) ke file PHP utama untuk diproses
- Data formulir dikirim melalui POST/GET untuk diproses

**6.Main PHP files -> Client Browser:**
- File PHP utama mengirim HTTP response ke browser
- Response berisi HTML yang akan ditampilkan kepada user

# Dokumentasi
**Home**

![0cdc91c8-0945-43be-962f-0c07d5cf6fdc](https://github.com/user-attachments/assets/cb3e2375-2861-4fed-9b20-f7fc85198641)

**Kategori *(index)***

![68edbffa-ed2a-4fda-bc93-12d53b4bff5e](https://github.com/user-attachments/assets/e238c706-aa37-4180-87c2-cbde609f433e)

**Kategori *(search by nama_kategori)***

![7ab82d7b-faae-4f73-adad-e9c24b4a84c2](https://github.com/user-attachments/assets/3c9f0f21-aa03-4c2d-87c5-f74cebfea46f)

**Kategori *(add form)***

![4e65788b-a3d0-44e9-b2cd-8c8ca5b424eb](https://github.com/user-attachments/assets/866e0de8-90f0-4135-8604-26e0ca1c35cd)

**Kategori *(add success)***

![30ba140b-5e75-470b-8434-04f816ebf247](https://github.com/user-attachments/assets/daf645d6-3650-4a29-8ccb-a880a5c651e0)

**Kategori *(edit form)***

![23680822-f451-4dc9-a254-ec3a252f0030](https://github.com/user-attachments/assets/9e5e25aa-85c7-47ce-a0f2-52de6836fbb6)

**Kategori *(edit success)***

![f519198c-6498-40cd-89c4-4444de02b28a](https://github.com/user-attachments/assets/75d4e4db-9fc2-4bdf-bcb9-df9ca1dc1c1e)

**Kategori *(delete confirm)***

![c09a2380-7bb8-4429-a3e6-b6fc62ea4ba5](https://github.com/user-attachments/assets/2e1ee301-3adf-434c-b0e9-39758ede27b9)

**Kategori *(delete success)***

![42249aef-48b1-4521-affb-962faf7150e1](https://github.com/user-attachments/assets/169a43c6-0d64-47c2-8b3d-125c0e46dfd2)

**Produk *(index)***

![2da41592-dde5-4b5a-9406-2baa66761cf4](https://github.com/user-attachments/assets/e8084fa4-2e9a-4ada-bcc8-a6762417cdb6)

**Produk *(search by nama_produk)***

![b25d9cc8-2f58-424c-b0f4-2b8a269f1ced](https://github.com/user-attachments/assets/8dd86f33-ba1f-4369-80a0-00fcee15a7aa)

**Produk *(add form)***

![2a6996b8-5b22-45fc-b73c-218457bdd038](https://github.com/user-attachments/assets/c9241d9f-f049-43e9-ad60-97410b11e1ed)

**Produk *(add success)***

![bb6017d3-a3cd-42c2-a5ef-6458ef16993a](https://github.com/user-attachments/assets/e0e10c59-d530-475f-aab7-202ff80923aa)

**Produk *(edit form)***

![3bac5a69-f033-4056-8371-41b89206e86d](https://github.com/user-attachments/assets/becc2187-7472-4ecf-b6fa-b84d93b4d2f6)

**Produk *(edit success)***

![f8d6f8bc-7d2d-4ae6-ab1c-4245e6ec2300](https://github.com/user-attachments/assets/a6c4b3e0-85cb-4c42-bad6-851663d8acc6)

**Produk *(delete confirm)***

![e4008f20-e73e-4c2b-9d73-13a3459f5a48](https://github.com/user-attachments/assets/62ab98f7-c6f4-4c3e-863f-781a4cdfff2a)

**Produk *(delete success)***

![37bd6d25-9029-4a6f-b9c7-55a8f4e08249](https://github.com/user-attachments/assets/a9c7142a-38f5-4f0a-a500-3254b2d9388b)

**Pesanan *(index)***

![b3a3b66e-a174-4d35-9f62-ad2735a64d40](https://github.com/user-attachments/assets/5a2e7e26-294f-4d36-b126-d00ffef07078)

**Pesanan *(search by nama_produk)***

![e1e0ff3f-bb0c-4f68-89c4-16a6ba88fe98](https://github.com/user-attachments/assets/4cfa0f09-97e5-4783-82b6-34f0b965c730)

**Pesanan *(search by nama_pelanggan)***

![37da6468-72e8-4f89-9ca9-41a54a476778](https://github.com/user-attachments/assets/6a1b0897-d0f1-4efc-b254-b1b8a6760f71)

**Pesanan *(add form)***

![421fdfc9-99fa-47f0-8123-154d6f43cada](https://github.com/user-attachments/assets/2c7db0cf-c1b1-4874-988d-38d405eef3e2)

**Pesanan *(error message)***

![e3589d63-bbc7-4e0d-a030-0eaf0be898e8](https://github.com/user-attachments/assets/de1d58ab-dd19-421d-95f0-a94e65532b5b)

**Pesanan *(add success)***

![b78d1d2e-b45e-4ee1-aa5f-e73a415b9eac](https://github.com/user-attachments/assets/0f9ee88f-72fa-4e8d-8afa-65930ed4e674)

**Pesanan *(edit form)***

![e74becf2-6369-4174-b169-bd1da7e4994b](https://github.com/user-attachments/assets/1ed481b6-80cb-44b7-8754-35684371472b)

**Pesanan *(edit success)***

![2e52f65a-ea1b-4fc6-b8f1-3d7d51900bee](https://github.com/user-attachments/assets/1bc4bb3e-1c5e-405e-81fa-738b4703652c)

**Pesanan *(delete confirm)***

![6a820a6b-1a6a-410a-8969-9b133090f33c](https://github.com/user-attachments/assets/0b9d0800-245e-4209-a20a-1445f97bae98)

**Pesanan *(delete success)***

![bc423f73-5de7-4f21-b104-e913b46b71ab](https://github.com/user-attachments/assets/f9364afb-eac3-4345-8688-eb2ed818920c)

