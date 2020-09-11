<?php

use App\Models\Company\Company;
use App\Models\Job\CategoryJob;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'name' => 'IT Support',
                'slug' => 'it-support',
                'category_id' => 4,
                'company_id' => 1,
                'status' => 'READY', //Lowongan masih tersedia
                'location' => 'Yogyakarta, Kota Yogyakarta, Daerah Istimewa Yogyakarta',
                'requirement' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, nisi!',
                'required_skill' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste, repudiandae.',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita ducimus harum, inventore voluptatum voluptates quod! Fugiat alias repudiandae dolorum placeat?',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Web Developer',
                'slug' => 'web-developer',
                'category_id' => 1,
                'company_id' => 2,
                'status' => 'CLOSED', //Lowongan ditutup
                'location' => 'Babarsari, Tambak Bayan 3 No. 9, Janti, Caturtunggal, Depok Sub-District, Sleman Regency, Special Region of Yogyakarta 55281',
                'requirement' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, nisi!',
                'required_skill' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste, repudiandae.',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita ducimus harum, inventore voluptatum voluptates quod! Fugiat alias repudiandae dolorum placeat?',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'UX Writer',
                'slug' => 'ux-writer',
                'category_id' => 2,
                'company_id' => 3,
                'status' => 'READY', //Lowongan masih tersedia
                'location' => 'Kabupaten Sleman, Daerah Istimewa Yogyakarta',
                'requirement' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, nisi!',
                'required_skill' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste, repudiandae.',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita ducimus harum, inventore voluptatum voluptates quod! Fugiat alias repudiandae dolorum placeat?',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
