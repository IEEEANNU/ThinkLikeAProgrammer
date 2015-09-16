<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Submission;
use App\Question ;
use App\Assessment;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($questionId)
    {
        $question = Question::findOrFail($questionId);
        $this->authorize('grade', $question);
        $submissions = $question->submissions;
        return view('submissions.index')->with(compact(['question', 'submissions']));
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
            $question = Question::find($questionId); // TODO
            if (empty($question)) {
                retrun \Response::json(['error' => 'true', 'message' => 'Question Not found']);
            }
            $submission = new Submission($request->all());
            $submission->user_id = $request->user()->id;
            $observation = $question->observations()
                            ->where('user_id', '=', \Request::user()->id)
                            ->firstOrCreate(['user_id'=>\Request::user()->id]);
            $submission->hint_used = $observation->hint_used;
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
        $question = Question::findOrFail($questionId);
        $this->authorize('grade', $question);
        $submission = $question->submissions()->findOrFail($id);
        $prevId = $question->submissions()->where('created_at', '<', $submission->created_at)->max('id');
        $nextId = $question->submissions()->where('created_at', '>', $submission->created_at)->min('id');
        return view('submissions.show')->with(compact(['question', 'submission', 'nextId', 'prevId']));
    }
}
