<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
class AutoCompleteController extends Controller {

    public function index(){
        return view('autocomplete.index');
   }
    public function autoComplete(Request $request) {
        $query = $request->get('term','');

        $clients=Client::where('name','LIKE','%'.$query.'%')->get();

        $data=array();
        foreach ($clients as $client) {
                $data[]=array('value'=>$client->name,'id'=>$client->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }

}
