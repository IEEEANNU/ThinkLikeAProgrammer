<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
}
