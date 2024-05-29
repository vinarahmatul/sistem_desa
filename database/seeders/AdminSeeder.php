<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'id'                    => 1,
                'nama'                  => 'Admin Desa',
                'nik'                   => '367755325',
                'alamat'                => 'Desa Labanasem',
                'level'                 => 'admin',
                'email'                 => 'DesaLabanasem@gmail.com',
                'password'              => bcrypt('12345678'),
                'remember_token'        => Str::random(70),
                'created_at'            => '2022-03-17 04:21:52',
                'updated_at'            => '2022-03-17 04:21:52',
            ],
        ];

        Admin::insert($admin);
    }
}
