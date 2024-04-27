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
                'nama' => 'Faiq Ammar',
                'email' => 'faiqammar165@gmail.com',
                'password' => bcrypt('faiqammar'),
                'super_password' => bcrypt('faiqammar'),
                'roles_id' => '1',
                'nomor_handphone' => '089364728192',
                'gender' => 'Laki-Laki',
                'alamat' => 'Jl. Mastrip no 56, Sumber Sari, Jember, Jawa Timur'
            ],
            [
                'nama' => 'Abyan Athar',
                'email' => 'abyanath12@gmail.com',
                'password' => bcrypt('abyanathar12'),
                'roles_id' => '2',
                'nomor_handphone' => '089872618187',
                'gender' => 'Laki-Laki',
                'alamat' => 'Jl. Rembangan 18, Arjasa, Jember Jawa Timur'
            ],
            [
                'nama' => 'Guntur Cahyadi',
                'email' => 'gunturcahyadi50@gmail.com',
                'password' => bcrypt('guntur50'),
                'roles_id' => '3',
                'nomor_handphone' => '082748302341',
                'gender' => 'Laki-Laki',
                'alamat' => 'Jl.Kertajaya no 90, Sukosari, Jember, Jawa Timur'
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
