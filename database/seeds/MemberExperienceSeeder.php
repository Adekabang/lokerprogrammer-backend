<?php

use Illuminate\Database\Seeder;

class MemberExperienceSeeder extends Seeder
{
    public function run()
    {
        DB::table('member_experiences')->insert([
            [
                'members_id' => 1,
                'nama_perusahaan' => 'PT. ABC',
                'tanggal_masuk' => Carbon::now()->format('Y-m-d H:i:s'),
                'tanggal_keluar' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'members_id' => 2,
                'nama_perusahaan' => 'PT. XYZ',
                'tanggal_masuk' => Carbon::now()->format('Y-m-d H:i:s'),
                'tanggal_keluar' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'members_id' => 3,
                'nama_perusahaan' => 'PT. AMD',
                'tanggal_masuk' => Carbon::now()->format('Y-m-d H:i:s'),
                'tanggal_keluar' => Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
