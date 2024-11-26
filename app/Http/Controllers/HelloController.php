<?php

namespace App\Http\Controllers;

use App\Models\Hello;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        $hellotemp = Hello::all();
        return view('temp.hello', compact('hellotemp'))->with('success', 'daFta retrieved');
    }

    public function create(){
        return view('temp.create');
    }

    public function store(Request $request){
        $validaeData = $request->validate([
            'name' =>'required',
            'email' =>'required',
        ]);

        Hello::create($validaeData);

        return redirect()->route('hello.index')->with('success', 'Hello message created successfully');
    }
}
