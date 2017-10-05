<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getCatalogs()
    {
        $query = Catalog::select('id', 'name', 'description');
        return datatables($query)->make(true);
    }
}
