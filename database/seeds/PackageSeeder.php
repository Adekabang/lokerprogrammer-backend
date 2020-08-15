<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package')->insert(
            [
                'id' => 1,
                'package_name' => 'Silver',
                'price_package' => '110000',
                'package_expired' => '1',
            ]
        );
        DB::table('package')->insert(
            [
                'id' => 2,
                'package_name' => 'Gold',
                'price_package' => '250000',
                'package_expired' => '3',
            ]
        );
        DB::table('package')->insert(
            [
                'id' => 3,
                'package_name' => 'Platinum',
                'price_package' => '120000',
                'package_expired' => '2',
            ]
        );
    }
}
