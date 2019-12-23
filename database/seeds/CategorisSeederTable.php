<?php

use Illuminate\Database\Seeder;

class CategorisSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vp_categoris')->insert(
            [
                'cate_name'=>'nokia',
            ],
            [
                'cate_name'=>'samsung',
            ]
               
            );
    }
}
