<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionObservation;
use App\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       ;
        return view("level");
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $level=new Level;
        $level->name=$request->name;
        $level->mark=$request->mark;
        $level->active=$request->active=="yes"?1:0;
        $level->save();

        return view('level');
        //
    }
    public function  activate(Request $request,$levelid){
       $level=Level::find($levelid) ;
       $level->active=1;
       $level->save();
       return redirect()->back()->withInput();
    }
    public function  deactivate(Request $request,$levelid){
        $level=Level::find($levelid) ;
        $level->active=0;
        $level->save();
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    

}
