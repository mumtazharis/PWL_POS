<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h1>Form Tambah Data User</h1>
        <form method="POST" action="tambah_simpan">
            {{ csrf_field() }}
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Usernmae">
            <br>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama">
            <br>
            <label>Password</label>
            <input type="text" name="password" placeholder="Masukkan Password">
            <br>
            <label>Level ID</label>
            <input type="text" name="level_id" placeholder="Masukkan ID Level">
            <br><br>
            <input type="submit" class="btn btn-success" value="Simpan">
        </form>
    </body>
</html>