<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\DB;
class FoodController extends Controller
{
    public function list(){
        $food=DB::table('food')->select(DB::raw('name,count(name) as quantity'))->groupBy('name')->get();
        if(count($food) > 0) {
            return response()->json(["status" => "200", "success" => true, "count" => count($food), "data" => $food]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
    }
    public function search(Request $request){
        $food_search=Food::where('name','like','%' .$request->search.'%')->orWhere('price',$request->search)->get();
        if($food_search) {
            return response()->json(["status" => "200", "success" => true,"data" => $food_search]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food=DB::table('food')->get();
        if(count($food) > 0) {
            return response()->json(["status" => "200", "success" => true, "count" => count($food), "data" => $food]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}