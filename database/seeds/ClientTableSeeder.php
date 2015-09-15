<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //clear table
        CodeProject\Client::truncate();
        //insert 10 itens
        factory(CodeProject\Client::class, 10)->create();
    }
}
