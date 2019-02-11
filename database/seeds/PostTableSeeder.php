<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [ 'title'=>'boss','metatitle'=>'This is why we play','article'=>'this is my life','cat_id'=>1,'user_id'=>1]
        ]);
    }
}
