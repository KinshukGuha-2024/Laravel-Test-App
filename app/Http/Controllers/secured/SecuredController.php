<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SecuredController extends Controller
{
    public function dashboard() {
        $session_data = Session::all();

        return view('pages.secured.dashboard.dashboard');
    }
}
