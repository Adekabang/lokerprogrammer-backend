<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyPackageFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_package_features')->insert([
            [
                'company_packages_id' => 1,
                'feature_name' => '1 bulan Post Loker (20 Loker)',
                'slug' => Str::slug('1 bulan Post Loker (20 Loker)'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'company_packages_id' => 2,
                'feature_name' => '2 bulan Post Loker (50 Loker)',
                'slug' => Str::slug('2 bulan Post Loker (50 Loker)'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'company_packages_id' => 3,
                'feature_name' => '3 bulan Post Loker (100 Loker)',
                'slug' => Str::slug('3 bulan Post Loker (100 Loker)'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
