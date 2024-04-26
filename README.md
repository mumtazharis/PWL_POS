# Jobsheet 7
<hr>

### Nama : Ahmad Mumtaz Haris
### Kelas : TI-2F
### Absen : 04

<hr>

1. Apa perbedaan frontend template dengan backend template?

    Frontend template berfokus pada presentasi dan interaksi pengguna di browser, sementara backend template berperan dalam menghasilkan konten dinamis dan mengelola logika di sisi server. Keduanya bekerja bersama untuk menyajikan aplikasi web yang lengkap dan berfungsi dengan baik.

2. Apakah layouting itu penting dalam membangun sebuah website?

    Layouting adalah aspek yang sangat penting dalam pengembangan web karena berkontribusi secara langsung terhadap pengalaman pengguna, navigasi, keterbacaan konten, responsifitas, dan kesan visual keseluruhan dari sebuah situs web.

3. Jelaskan fungsi dari komponen laravel blade berikut : @include(), @extend(), @section(), @push(), @yield(), dan @stack()
    
    - Fungsi @include() digunakan untuk menyertakan (include) tampilan (view) lain ke dalam tampilan saat ini. 

    - @extend() dan @section() digunakan bersama-sama untuk membuat layout dan mengisi bagian konten dinamis di dalamnya. @extend() digunakan untuk menentukan layout induk yang akan digunakan, sementara @section() digunakan untuk mendefinisikan bagian-bagian spesifik dari layout tersebut. 

    - @push() dan @stack() digunakan untuk mengelola bagian-bagian tertentu dari tampilan, seperti script JavaScript atau CSS, yang akan dimasukkan ke dalam layout induk. @push() digunakan untuk menambahkan potongan kode ke dalam stack yang sudah ada, sedangkan @stack() digunakan untuk menampilkan seluruh stack di dalam layout induk. 

    - @yield() digunakan untuk menentukan area di dalam layout yang akan diisi oleh konten dari halaman spesifik. Ketika tampilan induk (@extend) dipanggil, @yield() menunjukkan di mana konten dari tampilan anak (@section) harus dimasukkan. 

    - @stack() digunakan untuk menunjukkan area tertentu di mana potongan kode dari beberapa halaman dapat ditumpuk (stacked) dan kemudian ditampilkan di layout induk. 

4. Apa fungsi dan tujuan dari variable $activeMenu ?