<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['admin','peserta'];
        $user = ['administrator', 'peserta'];
        for ($i=0; $i < count($role) ; $i++) {
             $data = DB::table('user_role')->insertGetId([
                'role' => $role[$i],
            ]);
            User::create([
                'name' => $user[$i],
                'email' => $user[$i].'@gmail.com',
                'password' => Hash::make('$user[$i]'),
                'id_role' => $data
            ]);
        };

    }
}
