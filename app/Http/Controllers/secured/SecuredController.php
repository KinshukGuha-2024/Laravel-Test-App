<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\UserMails;
use App\Models\AccessInformation;
use App\Models\Notifications;
use Illuminate\Notifications\Notification;

class SecuredController extends Controller
{
    public function dashboard() {
        $session_data = Session::all();
        return view('pages.secured.dashboard.dashboard', compact('session_data'));
    }

   public function getAllEmails() {
          $unread_mails = Notifications::select( 'user_mails.*')
                                   ->leftJoin('user_mails', 'user_mails.id', '=', 'notifications.type_id')
                                   ->where('notifications.is_seen', 0)
                                   ->where('notifications.type', 'new_mail')
                                   ->orderBy('notifications.created_at', 'DESC');
          $unread_mails_id = $unread_mails->pluck('id');
          $unread_mails = $unread_mails->get();
          foreach($unread_mails as $mail){
               $mail->time_ago = $this->timeAgo($mail->created_at);
          }
          $all_mails = UserMails::whereNotIn('id', $unread_mails_id)->get();

          foreach($all_mails as $mail){
               $mail->time_ago = $this->timeAgo($mail->created_at);
          }

          // echo json_encode($unread_mails);die;
        return view('pages.secured.dashboard.user_mails.index', compact('unread_mails','all_mails'));
   }

   public function getAllUsers() {
     $unread_users = Notifications::select('access_informations.*')
                              ->leftJoin('access_informations', 'access_informations.id', '=', 'notifications.type_id')
                              ->where('notifications.is_seen', 0)
                              ->where('notifications.type', 'new_user')
                              ->orderBy('notifications.created_at','DESC');
     $unread_users_id = $unread_users->pluck('id');
     $unread_users = $unread_users->get();
     foreach($unread_users as $mail){
          $mail->time_ago = $this->timeAgo($mail->created_at);
     }
     $all_users = AccessInformation::whereNotIn('id', $unread_users_id)->get();

     foreach($all_users as $mail){
          $mail->time_ago = $this->timeAgo($mail->created_at);
     }

     // echo json_encode($all_mails);die;
   return view('pages.secured.dashboard.user_access.index', compact('unread_users','all_users'));
}

   public function saveNotificationDownload() {
        Notifications::create([
            "type" => "resume_download",
            "type_id" => Session::get('user_login_id')
        ]);
        return response()->json("success");
   }

   public function readNotification(Request $request){
     try{
          DB::beginTransaction();
          $get_notification = Notifications::where('type_id', $request->id)->where('type', $request->type)->first();
          $update = Notifications::where('id', $get_notification->id)->update(['is_seen' => 1]);
          if($update) {
               DB::commit();
               return response()->json(["success" => true, "message" => "success"]);
          } else {
               DB::rollBack();
               return response()->json(["success" => false, "message" => "something went wrong"]);
          }
     } catch (\Exception $e) {
          DB::rollBack();
          return response()->json(["success" => false, "message" => $e->getMessage()]);
     }
   }

   private function timeAgo($created_at) {
          $created_time = strtotime($created_at); // Convert to timestamp
          $current_time = time();
          $diff = $current_time - $created_time;
     
          if ($diff < 60) {
          return 'now';
          } elseif ($diff < 3600) {
          return floor($diff / 60) . 'm';
          } elseif ($diff < 86400) {
          return floor($diff / 3600) . 'h';
          } elseif ($diff < 2592000) {
          return floor($diff / 86400) . 'd';
          } elseif ($diff < 31536000) {
          return floor($diff / 2592000) . 'mo';
          } else {
          return floor($diff / 31536000) . 'y';
          }
   }

   
}
