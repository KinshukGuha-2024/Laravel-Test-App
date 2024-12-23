<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use App\Models\BasicInformationModel;
use App\Models\SkillModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class SkillController extends Controller
{
    // Get All Skills Data
    public function get_skill () {
        $skill_data = SkillModel::selectRaw('COUNT(skill.id) as skill_count, basic_info_user.name, basic_info_user.id')
                                ->rightJoin('basic_info_user', 'skill.user_id', '=', 'basic_info_user.id')
                                ->groupBy('basic_info_user.name', 'basic_info_user.id')
                                ->orderBy('basic_info_user.active', 'desc')
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
        $get_skill_data = SkillModel::where('user_id', $id)
                                    ->orderBy('skill_percent')
                                    ->get();
        $selected_user = BasicInformationModel::where('id', $id)->first();
        $user_data = BasicInformationModel::all();
        return view('pages.secured.dashboard.skill.edit', compact('get_skill_data', 'user_data', 'selected_user'));
    }

    // Update Skills Data
    public function update_skill (Request $request) {
        $get_user_details = DB::table('basic_info_user as a')
                                ->select('a.id', 'a.name')
                                ->leftJoin('skill as b', 'a.id', '=', 'b.user_id')
                                ->where('b.user_id', $request->user_id)
                                ->first();

        DB::beginTransaction();
        try{

            if($get_user_details) {
                $delete_data = SkillModel::where('user_id', $request->user_id)->delete();
                if($delete_data) {
                    for ($i = 0; $i < count($request->skill_name); $i++) {
                        $skill_data[] = [
                            'user_id' => $request['user_id'],
                            'skill_name' => $request->skill_name[$i],
                            'skill_percent' => $this->get_rating_wise_percent($request->rating[$i]),
                            'created_at' => now(), 
                            'updated_at' => now(), 
                        ];
                    }
                    $save_data = SkillModel::insert($skill_data);
    
                    if($save_data) {
                        DB::commit();
                        return redirect()->route('secured.skill.get')->with([
                            "status" => "Skill(s) Updated For User " . $get_user_details->name . " !"
                        ]);
                    }
                    else{
                        DB::rollBack();
                        return redirect()->route('secured.skill.get')->with('error', 'Something went wrong when saving the skill(s)' );
                    }
                    
                }
                else{
                    DB::rollBack();
                    return redirect()->route('secured.skill.get')->with('error', 'User invalid or not exist(s)' );
                }
            } 
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('secured.skill.get')->with('error', 'An error occurred while updating Skill(s)' );

        }


    }
        
    

    // Delete Existing Skill 
    public function reset_skill ($id) {
        
        $get_user_details = DB::table('basic_info_user as a')
                                ->select('a.id', 'a.name')
                                ->leftJoin('skill as b', 'a.id', '=', 'b.user_id')
                                ->where('b.user_id', $id)
                                ->first();

        if($get_user_details) {
            SkillModel::where('user_id', $id)->delete();
            $success_message = 'Skill(s) reseted for ' . $get_user_details->name ; 
            return redirect()->route('secured.skill.get')->with('status', $success_message);
        }
        else {
            return redirect()->route('secured.skill.get')->with('error', 'Skill(s) not found or already reseted.');  
        }

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
