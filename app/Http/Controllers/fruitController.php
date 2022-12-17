<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\termek;

class fruitController extends Controller
{
   
    public function store(Request $request){
        //Data question from database with Models
        /*foreach (termek::all() as $termek) {   
        }*/
        $fruits = DB::select('select * from termek');
        foreach ($fruits as $fruit){
            $card = $request->input('row'.$fruit->id);//input data to variable
            
            //Az input adat kerüljön bele abba az adatbázis kosar cellába, ahol az input soránák name metódusa megyegyezik az adatbázis sorának id -jével*/
            $termek = termek::where('id', $fruit->id)->get();//data question from database
            foreach ($termek as $object){//read data to variable
                    $object->kosar = $card;//input data to kosar
            }
            $object->save();//database data saving
        }
        
        return redirect('/fruit')->with('success', 'A terméket kosárba raktuk.');// go back to page with message
    }

//Kosár tartalma letölthető legyen CSV formátumban.
    
}