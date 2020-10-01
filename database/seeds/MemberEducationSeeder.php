<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberEducationSeeder extends Seeder
{
    public function run()
    {
        DB::table('member_education')->insert([
            [
                'members_id' => 1,
                'nama_sekolah' => 'SMA 1 Jakarta',
                'jenjang' => 'SMA',
                'bidang_studi' => 'IPA',
                'tanggal_masuk' => Carbon::now()->format('Y-m-d H:i:s'),
                'tanggal_keluar' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'members_id' => 2,
                'nama_sekolah' => 'SMA 3 Jakarta',
                'jenjang' => 'SMA',
                'bidang_studi' => 'IPS',
                'tanggal_masuk' => Carbon::now()->format('Y-m-d H:i:s'),
                'tanggal_keluar' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'members_id' => 3,
                'nama_sekolah' => 'SMK 1 Jakarta',
                'jenjang' => 'SMK',
                'bidang_studi' => 'Teknik Mesin',
                'tanggal_masuk' => Carbon::now()->format('Y-m-d H:i:s'),
                'tanggal_keluar' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
