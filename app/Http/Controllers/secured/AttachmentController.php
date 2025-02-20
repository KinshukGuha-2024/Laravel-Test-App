<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\BasicInformationModel;


class AttachmentController extends Controller
{
    public function get_attachment () {
        $attachment_data = Attachments::selectRaw('COUNT(attachments.id) as attachment_count, basic_info_user.name, basic_info_user.id')
                                ->rightJoin('basic_info_user', 'attachments.user_id', '=', 'basic_info_user.id')
                                ->groupBy('basic_info_user.name', 'basic_info_user.id')
                                ->having('attachment_count', '>', 1)
                                ->orderBy('basic_info_user.active', 'desc')
                                ->get();

        return view('pages.secured.dashboard.attachment.attachment', compact('attachment_data'));
       
    }

    public function save_attachment_get_data () {
        $user_data = BasicInformationModel::all();
        return view('pages.secured.dashboard.attachment.add', compact('user_data'));
    }
    
    // Save attachment Data
    public function save_attachment (Request $request) {
        $uploadPath = public_path('storage/uploads/attachments');
        $multiImageArr = [];
        if ($request->hasFile('uploads')) {
            foreach ($request->file('uploads') as $file) {
                if ($file->isValid()) { 
                    $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); 
                    $file->move($uploadPath, $imageName);  
                    $multiImageArr[] = $imageName; 
                } else {
                    return response()->json(['success' => false, 'message' => 'One or more files are invalid.']);
                }
            }
        }
        if ($request->hasFile('resume')) {
            $resumeName = time() . '.' . $request->file('resume')->extension();
            $request->file('resume')->move($uploadPath, $resumeName);
        }
        $saveArr = [];
        foreach($multiImageArr as $image) {
            $saveArr[]= [
                "user_id" => $request->user_id,
                "attachment_path" => $image,
                "type" => "attachments",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ];
        }
        $saveArr[] = [
            "user_id" => $request->user_id,
            "attachment_path" => $resumeName,
            "type" => "resume",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];
        Attachments::insert($saveArr);
        return redirect()->route('secured.attachment.get')->with([
            "status" => "Attachments Added Successfully !"
        ]);
    }

    // Get attachment Data During Update 
    public function update_get_attachment ($id) {
        $get_attachment_uploads_data = Attachments::where('user_id', $id)
                                        ->where('type', 'attachments')
                                        ->get();
        $get_attachment_resume_data = Attachments::where('user_id', $id)
                                        ->where('type', 'resume')
                                        ->first();
        return view('pages.secured.dashboard.attachment.edit', compact('get_attachment_uploads_data','get_attachment_resume_data'));
        
    }

    // Update attachments Data
    public function update_attachment (Request $request) {
        


    }

    // Delete Existing attachment 
    public function reset_attachment ($id) {
        $get_user_details = DB::table('basic_info_user as a')
                                ->select('a.id', 'a.name')
                                ->leftJoin('attachments as b', 'a.id', '=', 'b.user_id')
                                ->where('b.user_id', $id)
                                ->first();

        if($get_user_details) {
            Attachments::where('user_id', $id)->delete();
            $success_message = 'Attachment(s) reseted for ' . $get_user_details->name ; 
            return redirect()->route('secured.attachment.get')->with('status', $success_message);
        }
        else {
            return redirect()->route('secured.attachment.get')->with('error', 'Attachment(s) not found or already reseted.');  
        }
        

    }
    
}
