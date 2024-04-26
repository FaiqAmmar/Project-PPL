<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            [
                'nama' => 'Faiq Ammar',
                'email' => 'faiqammar165@gmail.com',
                'password' => bcrypt('faiqammar'),
                'super_password' => bcrypt('faiqammar'),
                'nomor_handphone' => '089364728192',
                'alamat' => 'Jl. Mastrip no 56, Sumber Sari, Jember, Jawa Timur'
            ]
        ];

        foreach ($adminData as $key => $val){
            Admin::create($val);
        }
    }
}
