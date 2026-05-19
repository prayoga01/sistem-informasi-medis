<?php

namespace Database\Seeders;

use App\Models\Dokter;
use App\Models\User;
use App\Models\Ahli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(
            [
            'name' => 'yoga pratama',
            'email' => 'yoga@gmail.com',
            'no_tlp' => '08789098777',
            'password' => bcrypt('12345678')
            ]
        );
        User::create(
            [
            'name' => 'Petugas Pelepasan Dokumen',
            'email' => 'petugas@gmail.com',
            'no_tlp' => '(0361) 222487 - 222141 - 234532',
            'role' => '1',
            'password' => bcrypt('12345678')
            ]
        );
        // Dokter::create(
        //     [
        //     'kd_dokter' => '0111',
        //     'nmdokter' => 'Dr I.A Manik Sp.AN',
        //     // 'bidangahli' => 'Sepesialis Anastesi',
        //     ]
        // );
        // Dokter::create(
        //     [
        //     'kd_dokter' => '0112',
        //     'nmdokter' => 'Dr Parwata Sp.JP',
        //     // 'bidangahli' => 'Sepesialis Jantung dan Pembulu Darah',
        //     ]
        // );
        Ahli::create(
            [
            'bidangahli' => 'Spesialis Jantung dan Pembulu Darah'
            ]
        );
        Ahli::create(
            [
            'bidangahli' => 'Sepesialis Anastesi'
            ]
        );
    }
}