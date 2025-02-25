<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\BasicInformationModel;
use App\Models\UserMails;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomMail;
use App\Mail\UserConfirmationMail;

class HomeController extends Controller
{
    public function index() {
        $skill_information = BasicInformationModel::select('s.skill_name', 's.skill_percent')  // Selecting specific columns
                                            ->leftJoin('skill as s', 'basic_info_user.id', '=', 's.user_id')
                                            ->where('basic_info_user.active', 'Active')  // Adding table name to avoid ambiguity
                                            ->get();

        $basic_info = BasicInformationModel::select('basic_info_user.*') 
                                            ->where('basic_info_user.active', 'Active')  
                                            ->first();

        $attachment_info = BasicInformationModel::select('a.type', 'a.attachment_path')  // Selecting specific columns
                                            ->leftJoin('attachments as a', 'basic_info_user.id', '=', 'a.user_id')
                                            ->where('basic_info_user.active', 'Active')  // Adding table name to avoid ambiguity
                                            ->get();                             

        return view('pages.home.home', compact('basic_info', 'skill_information', 'attachment_info'));
    } 

    public function success(){
        return view('pages.success.sendMail');
    }

    public function send_mail(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        try{
            $userMail = UserMails::create([
                            "name" => $request->name,
                            "email" => $request->email,
                            "subject" => $request->subject,
                            "message" => $request->message
                        ]);
            Notifications::create([
                "type" => "new_mail",
                "type_id" => $userMail->id
            ]);
            Mail::to($details['email'])->send(new CustomMail($details));
            Mail::to($details['email'])->send(new UserConfirmationMail($details));
            return view('pages.success.sendMail');
        }catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
