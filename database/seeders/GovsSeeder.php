<?php

namespace Database\Seeders;

use App\Models\Gov;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $govData = [
            [
                'nama' => 'Guntur Cahyadi',
                'email' => 'gunturcahyadi50@gmail.com',
                'password' => bcrypt('guntur50'),
                'nomor_handphone' => '082748302341',
                'gender' => 'Laki-Laki',
                'alamat' => 'Jl.Kertajaya no 90, Sukosari, Jember, Jawa Timur'
            ]
        ];

        foreach($govData as $key => $val){
            Gov::create($val);
        }
    }
}
