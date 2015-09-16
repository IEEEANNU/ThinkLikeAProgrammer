<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Assessment;
use App\Question;
use App\Submission;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($questionId, $submissionId)
    {
        $question = Question::findOrFail($questionId);
        $this->authorize('grade', $question);
        $submission = Submission::findOrFail($submissionId);
        $assessments = $submission->assessments;
        return view('assessments.index')->with(compact(['question', 'submission', 'assessments']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function assess(Request $request, $questionId, $submissionId)
    {
        if ($request->ajax()) {
            $question = Question::find($questionId); // TODO
            
            if ($request->user()->cannot('grade', $question)) {
                retrun \Response::json(['error' => 'true', 'message' => 'Question Not found']);
            }
            if (empty($question)) {
                retrun \Response::json(['error' => 'true', 'message' => 'Question Not found']);
            }
            $submission = Submission::findOrFail($submissionId);
            $assessment = new Assessment($request->all());
            $assessment->submission_id = $submission->id;
            $assessment->grader_id = $request->user()->id;
            $assessment->updateFinalGrade();
            $submission->updateScore();
            $submission->user->updateTotalScore();
            return \Response::json(['success' => 'true']);
        } else {
            return redirect()->home();
        }
    }
}
