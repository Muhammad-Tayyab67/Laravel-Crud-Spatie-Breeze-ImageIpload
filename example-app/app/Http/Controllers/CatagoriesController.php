<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatagoriesModel;

class CatagoriesController extends Controller
{
    public function index(){
        $catagories= CatagoriesModel::all();
        
        return view('caragories.list', compact('catagories'));

    }
    public function create(){
        
        return view('caragories.create');

    }
    public function store(Request $request){
        //Image Path
        $name = time().$request->avatar->getClientOriginalName();
        //store image
        $image= $request->avatar->move(public_path().'/img/product-img/main/', $name);

        $catagory=new CatagoriesModel;
        $catagory->name=$request->name;
        $catagory->phone=$request->phone;
        $catagory->picpath=$name;
        $catagory->save();
        return redirect('/cat');
    }


    public function edit($id){
$catagory=CatagoriesModel::where('id',$id)->first();
return view('caragories.edit', compact('catagory'));
}

public function update(Request $request, $id){

    $catagory=CatagoriesModel::where('id',$id)->first();
    $catagory->name=$request->name;
    $catagory->phone=$request->phone;
    $catagory->save();

    return redirect('/cat');
}

public function delete(Request $request, $id){
    
    $catagory=CatagoriesModel::where('id',$id)->delete();
   
    return redirect('/cat');
}


}
