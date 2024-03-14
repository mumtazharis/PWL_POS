<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'namager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
            
        // ];
        // UserModel::create($data);

        $user = UserModel::create(
            [
                'username' => 'manager11',
                'nama' => 'Manager11',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        $user->username = 'manager12';
        // $user->isDirty();
        // $user->isDirty('username');
        // $user->isDirty('nama');
        // $user->isDirty(['nama','username']);

        // $user->isClean();
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean(['nama','username']);

        $user->save();
        $user->wasChanged();
        $user->wasChanged('username');
        $user->wasChanged(['username', 'level_id']);
        $user->wasChanged('nama');
        $user->wasChanged('nama', 'username');


        // $user->isDirty();
        // $user->isClean();
        //dd($user->isDirty());
        dd($user->wasChanged(['nama', 'username']));
        // return view('user', ['data'=>$user]);
    }
}
