<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->command->info('Truncating Categories table');

		$this->command->info('Creating główna category');
        DB::table('categories')->insert([
        	'name' => 'główna',
        	]);
        
        $this->command->info('Creating poczekalnia category');  
        DB::table('categories')->insert([
        	'name' => 'poczekalnia',
        	]);
        
        $this->command->info('Creating niezweryfikowane category');  
        DB::table('categories')->insert([
        	'name' => 'niezweryfikowane',
        	]);

		$this->command->info('Creating odrzut category');  
        DB::table('categories')->insert([
        	'name' => 'odrzut',
        	]);

        $this->command->info('Categories created');

    }
}
