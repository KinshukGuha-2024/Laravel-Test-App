<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use App\Models\SkillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    // Get All Skills Data
    public function get_skill () {
        $skill_data = SkillModel::orderBy('skill_percent')->get();
        return view('pages.secured.dashboard.skill.skill', compact('skill_data'));
    }
    
    // Save Skill Data
    public function save_skill (Request $request) {
        
    }

    // Get Skill Data During Update 
    public function update_get_skill ($id) {
        
    }

    // Update Skills Data
    public function update_skill (Request $request) {
        
    }

    // Delete Existing Skill 
    public function delete_skill ($id) {
        
    }
}
