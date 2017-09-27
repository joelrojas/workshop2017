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

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_1";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_2";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_3";
        $catalog->description = "Catalog for country names";
        $catalog->save();    
        
        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_4";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_5";
        $catalog->description = "Catalog for country names";
        $catalog->save();     
        
        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_6";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_7";
        $catalog->description = "Catalog for country names";
        $catalog->save();     
        
        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_8";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_9";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_10";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_11";
        $catalog->description = "Catalog for country names";
        $catalog->save();        

        $catalog = new Catalog;
        $catalog->name = "CAT_COUNTRY_12";
        $catalog->description = "Catalog for country names";
        $catalog->save();        
    }
}
