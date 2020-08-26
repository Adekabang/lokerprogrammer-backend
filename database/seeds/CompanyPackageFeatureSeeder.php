<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'feature_name' => '1 bulan Nonton Semua Video Sepuasnya',
            ],
            [
                'company_packages_id' => 2,
                'feature_name' => '3 bulan Nonton Semua Video Sepuasnya',
            ],
            [
                'company_packages_id' => 3,
                'feature_name' => '6 bulan Nonton Semua Video Sepuasnya',
            ]
        ]);
    }
}
