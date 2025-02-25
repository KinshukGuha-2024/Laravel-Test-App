<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\UserMails;




class SecuredController extends Controller
{
    public function dashboard() {
        $session_data = Session::all();
        return view('pages.secured.dashboard.dashboard', compact('session_data'));
    }

   public function getAllEmails() {
        $mails_data = UserMails::get();
        return view('pages.secured.dashboard.user_mails.index', compact('mails_data'));
   }

   public function saveNotificationDownload() {
        // Notifications::create([
        //     "type" => "new_mail"
        // ]);
        return response()->json("hello");
   }

   
}
