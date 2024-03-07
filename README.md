# Jobsheet 3
<hr>

### Nama : Ahmad Mumtaz Haris
### Kelas : TI-2F
### Absen : 04

<hr>

1. Pada Praktikum 1 - Tahap 5, apakah fungsi dari APP_KEY pada file setting .env Laravel?
<br>Digunakan untuk enkripsi data, seperti sesi pengguna dan cookie.

2. Pada Praktikum 1, bagaimana kita men-generate nilai untuk APP_KEY?
<br>Dengan menggunakan php artisan key:generate

3. Pada Praktikum 2.1 - Tahap 1, secara default Laravel memiliki berapa file migrasi?
dan untuk apa saja file migrasi tersebut?
<br>Terdapat 4 file migrasi default, digunakan untuk membuat struktur database

4. Secara default, file migrasi terdapat kode $table->timestamps();, apa tujuan/output dari fungsi tersebut?
<br>Digunakan untuk menambahkan dua kolom ke tabel yang sedang dibuat, yaitu created_at dan updated_at. Tujuan utamanya adalah untuk secara otomatis menyimpan tanggal dan waktu ketika sebuah record ditambahkan (created_at) dan ketika record tersebut terakhir kali diubah (updated_at).
5. Pada File Migrasi, terdapat fungsi $table->id(); Tipe data apa yang dihasilkan dari fungsi tersebut?
<br>Secara otomatis membuat kolom primary key untuk tabel yang sedang dibuat.
6. Apa bedanya hasil migrasi pada table m_level, antara menggunakan $table->id();
dengan menggunakan $table->id('level_id'); ?
<br>Perbedaannya pada nama kolom , $table->id(); maka akan membuat kolom dengan nama id sedangkan $table->id('level_id'); akan membuat kolom dengan nama level_id
7. Pada migration, Fungsi ->unique() digunakan untuk apa?
<br>Digunakan untuk menetapkan indeks unik pada satu atau beberapa kolom dalam tabel database
8. Pada Praktikum 2.2 - Tahap 2, kenapa kolom level_id pada tabel m_user
menggunakan $tabel->unsignedBigInteger('level_id'), sedangkan kolom level_id
pada tabel m_level menggunakan $tabel->id('level_id') ?
<br>Karena level_id pada tabel m_user adalah foreign key dari tabel m_level, sedangkan pada tabel m_level menggunakan id karena kolom level_id merupakan primary key dari tabel m_level
9. Pada Praktikum 3 - Tahap 6, apa tujuan dari Class Hash? dan apa maksud dari kode
program Hash::make('1234');?
<br>Hash digunakan untuk mengenkripsi data.
10. Pada Praktikum 4 - Tahap 3/5/7, pada query builder terdapat tanda tanya (?), apa
kegunaan dari tanda tanya (?) tersebut?
<br>Digunakan sebagai parameter placeholder atau bind parameter. 
11. Pada Praktikum 6 - Tahap 3, apa tujuan penulisan kode protected $table =
‘m_user’; dan protected $primaryKey = ‘user_id’; ?
<br>Digunakan untuk mendeklarasi nama tabel dan kolom primary yang akan digunakan pada model tersebut. Modifier protected agar variabel tersebut hanya dapat diakses dari class itu sendiri dan class turunannya
12. Menurut kalian, lebih mudah menggunakan mana dalam melakukan operasi CRUD ke
database (DB Façade / Query Builder / Eloquent ORM) ? jelaskan
<br>ORM,  karena kemudahan penggunaan, ekspresivitas, dan kemampuannya dalam mengelola relasi antar tabel.