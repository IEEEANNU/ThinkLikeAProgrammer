<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionObservation;
use App\Level;

class QuestionController extends Controller
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
        $levels=level::all();
        return view("questions.create",compact(['levels']));
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
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required'
        ]);
        $question=new Question;
        $question->level_id=$request->level;
        $question->name=$request->name;
        $question->link=$request->link;
        $question->blocks=$request->blocks;
        $question->description=$request->description;
        $question->hint_text=$request->hint_text;
        $question->hint_penalty=$request->hint_penalty;
        $question->save();

        $imgExtension=$request->file('image')->getClientOriginalExtension();
        //$request->file('image')->move(base_path().'/../public/images/questions/',$question->id.'.'.$imgExtension);
       	$request->file('image')->move('images/questions/',$question->id.'.'.$imgExtension);
        $name=$question->id.'.'.$imgExtension;
        $question->image=$name;

	if(null !==$request->file('hint_img')){
	$randomProtection = rand(0,1000000);
	$protectedName = 'hint_'.$randomProtection.'_'.$name;
        $imgExtension=$request->file('hint_img')->getClientOriginalExtension();
      	$request->file('hint_img')->move('images/questions/',$protectedName );
      	$question->hint_image=$protectedName ;
      	}
	
        $name=$question->id.'.'.$imgExtension;

        $question->save();

        return redirect()->route("Question::create");
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        if(!\Request::user()->isSuperAdmin()) {
        $question = Question::activated()->findOrFail($id);
        }
        else {
            $question = Question::findOrFail($id);
        }
        $observation = $question->observations()
            ->where('user_id', '=', \Request::user()->id)
            ->firstOrCreate(['user_id' => \Request::user()->id]);
        $observation->touch();
        return view('questions.show')->with(compact(['question', 'observation']));
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
    
    public function hint(Request $request, $id) {
        if ($request->ajax()) {
            $question = Question::find($id);
            if (empty($question)) {
                retrun \Response::json(['error' => 'true', 'message' => 'Question Not found']);
            }
            $observation = $question->observations()
                            ->where('user_id', '=', \Request::user()->id)
                            ->firstOrNew(['user_id'=>\Request::user()->id]);
            $observation->hint_used = true;
            $observation->save();
            return \Response::json([
                'success' => 'true',
                'data' => [
                    'text' => $question->hint_text,
                    'image' => $question->hint_image,
                ],
            ]);
        } else {
            return redirect()->home();
        }
    }
}
