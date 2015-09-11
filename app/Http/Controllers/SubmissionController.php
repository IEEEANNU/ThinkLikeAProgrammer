<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Submission;
use App\Question ;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($questionId)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function submit(Request $request, $questionId)
    {
        if ($request->ajax()) {
            $question = Question::find($questionId);
            if (empty($question)) {
                retrun \Response::json(['error' => 'true', 'message' => 'Question Not found']);
            }
            $submission = new Submission($request->all());
            $submission->user_id = $request->user()->id;
            // TODO hint_used submission
            $question->submissions()->save($submission);
            return \Response::json(['success' => 'true']);
        } else {
            return redirect()->home();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($questionId, $id)
    {
        //
    }
}
