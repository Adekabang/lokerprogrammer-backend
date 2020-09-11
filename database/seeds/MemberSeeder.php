<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'users_id' => 1,
                'profesi' => 'Backend Developer',
                'no_handphone' => '089612345678',
                'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, delectus!',
                'address' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt, officia!',
                'status' => 'AKTIF',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'users_id' => 2,
                'profesi' => 'UI/UX Designer',
                'no_handphone' => '089643215678',
                'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, delectus!',
                'address' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt, officia!',
                'status' => 'AKTIF',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'users_id' => 3,
                'profesi' => 'Fullstack Developer',
                'no_handphone' => '089612348765',
                'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, delectus!',
                'address' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt, officia!',
                'status' => 'NON-AKTIF',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
