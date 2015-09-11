<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionObservation;

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
        $question = Question::activated()->findOrFail($id);
        $observation = $question->observations()
                            ->where('user_id', '=', \Request::user()->id)
                            ->firstOrCreate(['user_id'=>\Request::user()->id]);
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
