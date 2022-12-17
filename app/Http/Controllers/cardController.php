<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class cardController extends Controller
{
   public function store(){
        if(isset($_POST["Export"])){
            //open the csv file
            $output = fopen("csv/card", "w");  
            fputcsv($output, array('A kosarad tartalma'));
            //write to file datas of the card 
            $fruits = DB::select('select * from termek');
            foreach ($fruits as $fruit){
            fwrite($output, ($fruit->name.':'.$fruit->kosar.','));
            };
            fclose($output);
        }
        //File download
        return response()->download(public_path('csv\card'));

    }

}
