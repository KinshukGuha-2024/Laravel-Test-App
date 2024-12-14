<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\BasicInformationModel;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index() {
        $basic_info = BasicInformationModel::where('active','Active')->first();
        return view('pages.home.home', compact('basic_info'));
    } 
}
