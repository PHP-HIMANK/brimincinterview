<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['category_name'=>'Individual','created_at'=>Carbon::now()]);
        DB::table('categories')->insert(['category_name'=>'Community','created_at'=>Carbon::now()]);
        DB::table('categories')->insert(['category_name'=>'Company','created_at'=>Carbon::now()]);
    }
}
