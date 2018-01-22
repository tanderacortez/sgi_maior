<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CredenciaisSeeder::class);
         $this->call(PermissoesSeeder::class);

         //Rodar só uma classe php artisan db:seed --class=CredenciaisSeeder
        //Rodar tudo php artisan db:seed
    }
}
