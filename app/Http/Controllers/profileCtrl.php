<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class profileCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
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

        print_r($leaders);

      // foreach ($users as $user) {
      //   $leaders[$user->id] =
      //     array($user->name,$user->total_score);
      // }

      //$leaders = ['AhmadH','TamerHN','MahmoodKS'];
      $questions = array(
        array(1,1,'square','simple square',5,'No'),
        array(2,1,'circle','circles',5,'No'),
        array(3,2,'polygons','polygons',10,'No'),
        array(4,2,'complex','complex',10,'No')
      );
      return view('profile')->withLeaders($leaders)->withQuestions($questions);
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
    public function show($username)
    {
      //
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
