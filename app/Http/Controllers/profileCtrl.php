<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class profileCtrl extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      // $a = [];
      // $a = session()->pull('userSession');

      $leaders = array();
      $users = DB::table('users')->get();
      $leaders[0] = $users[0];
      $leaders[1] = $users[1];
      $leaders[2] = $users[2];
      foreach ($users as $user) {
        if($user->total_score > $leaders[0]->total_score)
        {
          $leaders[0] = $user;
        }
        else if($user->total_score > $leaders[1]->total_score)
        {
          $leaders[1] = $user;
        }
        else if($user->total_score > $leaders[2]->total_score)
        {
          $leaders[2] = $user;
        }
      }

      $questions = DB::table('questions')->get();

      return view('profile')->withLeaders($leaders)->withQuestions($questions);
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
      return 'go inside the $id (sub)';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return "you're editing $id (sub)";
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
        return "saving the edited $id";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return "deleting it";
    }

}
