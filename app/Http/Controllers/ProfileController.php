<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Level;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $levels = Level::where('active', '=', true)->get();

        // Maximum obtainable score from the currently available levels
        $maxScore = $levels->reduce(function($carry, $item){
            return $carry + $item->questions->count() * $item->mark;
        }, 1);

        // For leaderboard.
        $leaders = User::orderBy('total_score', 'desc')
            ->get();

        $myRank = 1 + $leaders->search(function($item, $key){
            return $item->id == \Auth::user()->id;
        });
        $myTotalScore = \Auth::user()->total_score;
        return view('profile', compact(['levels', 'leaders', 'myRank', 'myTotalScore', 'maxScore']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //return 'create a new user';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //return 'store the new user to the db';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      // return 'go inside the $id (sub)';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // return "you're editing $id (sub)";
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
        // return "saving the edited $id";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // return "deleting it";
    }

}
