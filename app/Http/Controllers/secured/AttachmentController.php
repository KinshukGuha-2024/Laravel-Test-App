<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attachments;

class AttachmentController extends Controller
{
    public function get_attachment () {
        $attachment_data = Attachments::selectRaw('COUNT(attachments.id) as attachment_count, basic_info_user.name, basic_info_user.id')
                                ->rightJoin('basic_info_user', 'attachments.user_id', '=', 'basic_info_user.id')
                                ->groupBy('basic_info_user.name', 'basic_info_user.id')
                                ->orderBy('basic_info_user.active', 'desc')
                                ->get();
        return view('pages.secured.dashboard.attachment.attachment', compact('attachment_data'));
       
    }

    public function save_attachment_get_data () {
        return view('pages.secured.dashboard.attachment.add');
        
    }
    
    // Save attachment Data
    public function save_attachment (Request $request) {
       
    }

    // Get attachment Data During Update 
    public function update_get_attachment ($id) {
        
    }

    // Update attachments Data
    public function update_attachment (Request $request) {
        


    }
        
    

    // Delete Existing attachment 
    public function reset_attachment ($id) {
        
        

    }
}
