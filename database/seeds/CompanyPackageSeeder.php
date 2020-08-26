<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_packages')->insert([
            [
                'package_name' => 'Silver',
                'price' => 125000,
            ],
            [
                'package_name' => 'Gold',
                'price' => 250000,
            ],
            [
                'package_name' => 'Platinum',
                'price' => 450000,
            ]
        ]);
    }
}
