<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FIleUploadController extends Controller
{
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        // return "Pemrosesan file upload disini";
        // dump($request->berkas);
        $request->validate([
            'nama' => 'required|string',
            'berkas' => 'required|file|image|max:5000'
        ]);

        $extfile = $request->berkas->extension();
        
        $namaFile = "$request->nama.".$extfile;

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);
        // echo "variabel path berisi: $path <br>";

        $pathBaru = asset('gambar/'.$namaFile);
        echo "Gambar berhasil di upload ke: $namaFile";
        echo "<br>";
        echo "<img src='$path' width='300' height='200'>";
        // echo $request->berkas->getClientOriginalName()."lolos validasi";

        // if($request ->hasFile('berkas')){
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".$request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".$request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // } else {
        //     echo "tidak ada berkas yang diupload";
        // }
    }
}
