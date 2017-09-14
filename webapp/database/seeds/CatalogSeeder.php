<?php

use Illuminate\Database\Seeder;
use App\Catalog;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY";
        $catalog->description = "Catalog for country names";
        $catalog->save();        
    }
}
