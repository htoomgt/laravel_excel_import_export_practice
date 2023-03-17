<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpreadSheetController extends Controller
{
    
    public function showQueuImportPage()
    {
        return view("import_by_queue");
    }


    public function importFileWithQueue(Request $request)
    {
        dd($request->all());
    }
}
