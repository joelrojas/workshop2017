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
        $quantityPeople = 100;
        factory(App\People::class, $quantityPeople)->create();
        $quantityUsers = 20;
        factory(App\User::class, $quantityUsers)->create();
        $quantityCustomer = 80;
        factory(App\Customer::class, $quantityCustomer)->create();
        //$quantityCatalogs = 1000;
        //factory(App\Catalog::class, $quantityCatalogs)->create();

        //$this->call(CatalogSeeder::class);
    }
}
