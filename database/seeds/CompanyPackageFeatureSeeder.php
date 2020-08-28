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
                'feature_name' => '1 bulan Post Loker (20 Loker)',
            ],
            [
                'company_packages_id' => 2,
                'feature_name' => '2 bulan Post Loker (50 Loker)',
            ],
            [
                'company_packages_id' => 3,
                'feature_name' => '3 bulan Post Loker (100 Loker)',
            ]
        ]);
    }
}
