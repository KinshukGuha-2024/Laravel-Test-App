<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;




class SecuredController extends Controller
{
    public function dashboard() {
        $session_data = Session::all();
        return view('pages.secured.dashboard.dashboard', compact('session_data'));
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
