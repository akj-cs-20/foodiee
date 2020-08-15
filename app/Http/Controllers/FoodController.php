<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retriving data
        $foods = Food::latest()->paginate(10);
        return view('food.index',compact('foods'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request,[
            'name' => 'required|unique:food,name|min:3|max:30',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);

        // images
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $image->move($destinationPath,$name);


        
        // storing data into food table
        Food::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category'),
            'price' => $request->get('price'),
            'image' => $name
        ]);

        return redirect()->back()->with('message','Food Created Successfully!');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('food.edit',compact('food'));
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
         // validate 
        $this->validate($request,[
            'name' =>"required|unique:food,name,$id|min:2|max:30",
            'price' => 'required|integer',
            'description' => 'required',
                
        ]);
        //updating category
        $food = Food::find($id);
        $name = $food->image;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath,$name);
        }
       
        $food->update( [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'category_id'=>$request->get('category'),
            'image'=>$name
        ]);
        return redirect()->route('food.index')->with('message','Food Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         //deleting items
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('food.index')->with('message','Food deleted!!!');
    }
}