<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concert;

class ApiController extends Controller
{
    public function listApi(){
        return response()->json(Concert::all());
    }

    // public function createApi(Request $request){
    //     $item = Concert::create($request->all());
    //     return response()->json($item);
    // }

    public function createApi(Request $request){
        $name = $request->input('name');
        $date = $request->input('date');
    
        if($name){
          $concert = new Concert();
          $concert->name = $name;
          $concert->date = $date;
          $concert->save();
          return response()->json(["status" => "success"]);
        }else{
          return response()->json(["status" => "error"]);
        }
      }

      public function deleteApi($id){
        $concert = Concert::find($id);
        if($concert){
            $concert->delete();
            return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }

    public function updateApi(Request $request)
    {
      $concert = Concert::find($request->input('id'));
      $concert->name = $request->input('name');
      $concert->date = $request->input('date');
      $concert->update();
      return response()->json(["status" => "concert updated successfully"]);
    }
}
