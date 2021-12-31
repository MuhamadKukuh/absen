<?php

use Illuminate\Database\Seeder;
use App\gender;
use App\kelas;
use App\keterangan;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        kelas::create([
            'kelas' => 'X-RPL'
        ]);

        kelas::create([
            'kelas' => 'XI-RPL'
        ]);

        kelas::create([
            'kelas' => 'XII-RPL'
        ]);

        gender::create([
            'gender' => 'Laki Laki'
        ]);

        gender::create([
            'gender' => 'Perempuan'
        ]);

        keterangan::create([
            'keterangan'    => 'hadir'
        ]);

        keterangan::create([
            'keterangan'    => 'sakit'
        ]);

        keterangan::create([
            'keterangan'    => 'izin'
        ]);

        keterangan::create([
            'keterangan'    => 'alpha'
        ]);

        user::create([
            'name'  => 'siapa',
            'nis'   => '20002',
            'id_gender' => 1,
            'id_kelas'  => 1,
            'status'    => 0
        ]);

        
        user::create([
            'name'  => 'siapa',
            'nis'   => '20002',
            'id_gender' => 1,
            'id_kelas'  => 2,
            'status'    => 0
        ]);

        user::create([
            'name'  => 'siapa',
            'nis'   => '20002',
            'id_gender' => 1,
            'id_kelas'  => 3,
            'status'    => 0
        ]);

        user::create([
            'name'  => 'siapa',
            'nis'   => '20002',
            'id_gender' => 1,
            'id_kelas'  => 2,
            'status'    => 0
        ]);


    }
}
