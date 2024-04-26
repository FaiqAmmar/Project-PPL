<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nama' => 'Abyan Athar',
                'email' => 'abyanath12@gmail.com',
                'password' => bcrypt('abyanathar12'),
                'nomor_handphone' => '089872618187',
                'gender' => 'Laki-Laki',
                'alamat' => 'Jl. Rembangan 18, Arjasa, Jember Jawa Timur'
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
