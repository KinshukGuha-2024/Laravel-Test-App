<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\BasicInformationModel;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index() {
        $basic_info = BasicInformationModel::select('basic_info_user.*', 's.skill_name')  // Selecting specific columns
                                            ->leftJoin('skill as s', 'basic_info_user.id', '=', 's.user_id')
                                            ->where('basic_info_user.active', 'Active')  // Adding table name to avoid ambiguity
                                            ->get();
                                            

        return view('pages.home.home', compact('basic_info'));
    } 
}
