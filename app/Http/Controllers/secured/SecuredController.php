<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SecuredController extends Controller
{
    public function dashboard() {
        $session_data = Session::all();

        return view('pages.secured.dashboard.dashboard', compact('session_data'));
    }

    // BASIC INFORMATION FUNCTIONS
    public function basic_information_get() {

        $session_data = Session::all();
        return view('pages.secured.dashboard.basic_information');
    }

    public function basic_information_edit(Request $request) {

    }
    
    public function basic_information_update($id) {

    }

    public function basic_information_delete($id) {

    }

    // ATTACHMENT FUNCTIONS
    public function attachment_get() {

    }

    public function attachment_edit(Request $request) {

    }
    
    public function attachment_update($id) {

    }

    public function attachment_delete($id) {

    }
}
