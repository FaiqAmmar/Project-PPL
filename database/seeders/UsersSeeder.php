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
                'alamat' => 'Jl. Mastrip no 56',
                'province_code'=> '35',
                'city_code'=> '3509',
                'district_code'=> '350921',
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
