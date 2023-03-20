<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;
use App\Imports\DeveloperImport;
use App\Jobs\ProcessCreateDeveloper;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;


class SpreadSheetController extends Controller
{

    public function showQueuImportPage()
    {
        return view("import_by_queue");
    }


    public function importFileWithQueue(Request $request)
    {


        // dd($request->all());


        $arrDevelopers = \Maatwebsite\Excel\Facades\Excel::toArray(new DeveloperImport(), $request->file('importingFile'),null,\Maatwebsite\Excel\Excel::XLSX);

        // dd($arrDevelopers);

        foreach ($arrDevelopers[0] as $key => $developer) {


            if($arrDevelopers[0][0] == $developer){
                continue;
            }

            // Log::info(json_encode($developer));
            // dd($developer);

            $developerToCreate = [
                'fullname' => $developer[0],
                'email' => $developer[1],
                'phone' => $developer[2]
            ];

            ProcessCreateDeveloper::dispatch($developerToCreate);


        }

        return back()->with('success', 'File Content has been imported successfully!');
    }


    /**
     * To generate specific row count of data
     *
     * @author Htoo Maung Thait
     * @since 2023-03-20
     *
     * @param Request $request
     * @return void
     */
    public function generateData(Request $request)
    {
        $rowCount = $request->rowCount ?? 2000;

        $faker = \Faker\Factory::create();

        for($i = 1; $i <= $rowCount; $i++){
            $developer = new Developer();
            $developer->fullname = $faker->name;
            $developer->email = $faker->email;
            $developer->phone = $faker->randomNumber();
            $developer->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data generated successfully!'
        ]);
    }
}
