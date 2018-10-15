<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function create(){
        return view('create');
    }

    public function store(Request $request)
    {
        
        if($request->file('filename'))
        {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        
        $passport= new \App\Passport;
        $passport->name=$request->get('name');
        $passport->email=$request->get('email');
        $passport->number=$request->get('number');
        $date=date_create($request->get('date'));
        $format = date_format($date, "d/m/Y h:i:s");
        // dd($format);
        $passport->date = strtotime($format);
        $passport->office=$request->get('office');
        $passport->filename=$request->get('name');
        $passport->save();

        return redirect('passports')->with('success', 'Information has been added');

    }
    public function index()
    {
        $passport=\App\Passport::all();
        return view('index',compact('passports'));
    }
    public function edit($id)
    {
        $passport = \App\Passport::find($id);
        return view('edit',compact('passport','id'));
    }
}
