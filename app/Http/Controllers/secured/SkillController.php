<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use App\Models\BasicInformationModel;
use App\Models\SkillModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    // Get All Skills Data
    public function get_skill () {
        $skill_data = SkillModel::selectRaw('COUNT(skill.id) as skill_count, basic_info_user.name')
    ->rightJoin('basic_info_user', 'skill.user_id', '=', 'basic_info_user.id')
    ->groupBy('basic_info_user.name')
    ->orderBy('skill_count', 'desc')
    ->get();


        return view('pages.secured.dashboard.skill.skill', compact('skill_data'));
    }

    public function save_skill_get_data () {
        $user_data = BasicInformationModel::all();
        return view('pages.secured.dashboard.skill.add', compact('user_data'));
    }
    
    // Save Skill Data
    public function save_skill (Request $request) {
        $skill_data = [];
        for ($i = 0; $i < count($request->skill_name); $i++) {
            $skill_data[] = [
                'user_id' => $request['user_id'],
                'skill_name' => $request->skill_name[$i],
                'skill_percent' => $this->get_rating_wise_percent($request->rating[$i]),
                'created_at' => now(), 
                'updated_at' => now(), 
            ];
        }
        SkillModel::insert($skill_data);
        $user_data = BasicInformationModel::where(['id' => $request['user_id']])->first();
        
        return redirect()->route('secured.skill.get')->with(['status' => 'Skill(s) Added for '. $user_data['name']. ' Successfully']);
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

    private function get_rating_wise_percent($star) {
        if($star == 1) {
            return 20;
        }
        elseif($star == 2) {
            return 40;
        }
        elseif($star == 3) {
            return 60;
        }
        elseif($star == 4) {
            return 80;
        }
        else {
            return 100;
        }
    }
}
