<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    /**
     * Redirects to login page
     *
     * @return Response
     */
    public function home() {
        return \Redirect::to('login');
    }
    
    public function leaderboard() {
        $this->authorize('grade', null);
        $users = User::orderBy('total_score', 'desc')->get();
        return view('leaderboard')->with(compact(['users']));
    }
}
