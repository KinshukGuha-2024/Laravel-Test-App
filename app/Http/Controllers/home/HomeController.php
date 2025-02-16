<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\BasicInformationModel;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index() {
        $skill_info = BasicInformationModel::select('s.skill_name', 's.skill_percent')  // Selecting specific columns
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
        $return_data = [
            "basic_info" => $basic_info,
            "skill_informattion" => $skill_info,
            "attachment_info" => $attachment_info
        ];                                 

        return view('pages.home.home', compact('return_data'));
    } 
}
