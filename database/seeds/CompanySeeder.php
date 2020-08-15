<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert(
            [
                'id' => 1,
                'company_name' => 'perusahaan B',
                'location' => 'Makassar',
                'contact' => '08229968622',
                'description' => 'bergerak di bidang manufaktur',
                'expired_date' => '2020-09-05',
                'user_id' => '3'
            ]);
        DB::table('company')->insert(
            [
                'id' => 2,
                'company_name' => 'perusahaan A',
                'location' => 'Surabaya',
                'contact' => '08229968622',
                'description' => 'bergerak di bidang manufaktur',
                'expired_date' => '2020-09-05',
                'user_id' => '3'
            ]);
    }
}
