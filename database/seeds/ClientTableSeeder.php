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
        CodeProject\Entidies\Client::truncate();
        //insert 10 itens
        factory(CodeProject\Entidies\Client::class, 10)->create();
    }
}
