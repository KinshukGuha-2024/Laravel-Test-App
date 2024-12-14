<?php

namespace App\Http\Controllers\secured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasicInformationModel;
use Illuminate\Support\Facades\DB;

class BasicInformationController extends Controller
{
    // Home view for basic information 
    public function basic_information_get() {
        $user_data = BasicInformationModel::orderBy('active')->get();
        return view('pages.secured.dashboard.basic_information.basic_information', compact('user_data'));
    }

    // Insert User Data
    public function basic_information_save(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'active' => 'required|max:25',
            'email' => 'required|email|unique:basic_info_user',
            'mobile' => 'required|digits:10|unique:basic_info_user', 
            'country' => 'required|max:30',
            'state' => 'required|max:30',
            'city' => 'required|max:30',
            'pincode' => 'required|digits:6', 
            'role' => 'required|max:20',
            'about' => 'required|min:20',
            'linkedin' => '',
            'facebook' => '',
            'github' => '',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $get_all = BasicInformationModel::where(['active' => 'Active'])->first();

            if($get_all && $validated['active'] == 'active') {
                return redirect()->route('secured.basic.info.get')->with(['error' => 'Only one person can be active at a time, please inactive others to continue']);
            }

            $uploadPath = public_path('storage/uploads'); 
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            if ($request->hasFile('profile_image')) {
                $imageName = time() . '.' . $request->file('profile_image')->extension();
                $request->file('profile_image')->move($uploadPath, $imageName);
                $fullImagePath = $imageName;
            } 

            $info_model = new BasicInformationModel();
            $info_model->fill([
                'name' => trim($validated['first_name']) . ' ' . trim($validated['last_name']),
                'first_name' => trim($validated['first_name']),
                'last_name' => trim($validated['last_name']),
                'active' => $validated['active'],
                'email' => trim($validated['email']),
                'mobile' => trim($validated['mobile']),
                'country' => trim($validated['country']),
                'state' => trim($validated['state']),
                'city' => trim($validated['city']),
                'pincode' => trim($validated['pincode']),
                'role' => trim($validated['role']),
                'about' => trim($validated['about']),
                'linked_in_id' => !empty(trim($validated['linkedin'])) ? trim($validated['linkedin']) : null,
                'facebook_id' => !empty(trim($validated['facebook'])) ? trim($validated['facebook']) : null,
                'github_id' => !empty(trim($validated['github'])) ? trim($validated['github']) : null,
                'image_path' => $fullImagePath, 
            ]);
            $info_model->save();
            return redirect()->route('secured.basic.info.get')->with([
                "status" => "User " . trim($validated['first_name']) . ' ' . trim($validated['last_name']) . " was added with status " . $validated['active'] . " !"
            ]);
        } catch (\Exception $e) {
            echo json_encode($e->getMessage());
            die;
        }
    }

    // Get User Data When Update
    public function basic_information_update_get($id) {
        $user_data = BasicInformationModel::where(["id" => $id])->first();
        return view('pages.secured.dashboard.basic_information.edit', compact('user_data'));
    }

    // User Update
    public function basic_information_update(Request $request) {
        $is_exist = $this->checkEmailMobileExists($request->email, $request->mobile, $request->id);
        $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'active' => 'required|max:25',
            'country' => 'required|max:30',
            'state' => 'required|max:30',
            'city' => 'required|max:30',
            'pincode' => 'required|digits:6',
            'role' => 'required|max:20',
            'about' => 'required|min:20',
            'linkedin' => '',
            'facebook' => '',
            'github' => '',
        ]);
        if($is_exist['mobile'] && $is_exist['email']){
            $request->validate([
                'email' => 'required|email|unique:basic_info_user',
                'mobile' => 'required|digits:10|unique:basic_info_user', 
            ]);
        }
        elseif($is_exist['email']){
            $request->validate([
                'email' => 'required|email|unique:basic_info_user',
                'mobile' => 'required|digits:10', 
            ]);
        }
        elseif($is_exist['mobile']){
            $request->validate([
                'mobile' => 'required|digits:10|unique:basic_info_user', 
                'email' => 'required|email',
            ]);
        } 
        else {
            $request->validate([
                'mobile' => 'required|digits:10', 
                'email' => 'required|email',
            ]);
        }

        try {
            $info_model = BasicInformationModel::find($request->id);
            if (!$info_model) {
                return redirect()->route('secured.basic.info.get')->with(['error' => 'User not found for update.']);
            }
             
            $uploadPath = storage_path('app/public/uploads');  
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
    
            // Handle Profile Image Upload
            if ($request->hasFile('profile_image')) {
                $existingImagePath = $request->input('existing_image_path');
                if ($existingImagePath && file_exists($uploadPath . '/' . $existingImagePath)) {
                    unlink($uploadPath . '/' . $existingImagePath);  
                }
                
                $imageName = time() . '.' . $request->file('profile_image')->extension();
                $request->file('profile_image')->move($uploadPath, $imageName);
                $fullImagePath = $imageName; 
            } else {
                $fullImagePath = $request->input('existing_image_path'); 
            } 

            DB::beginTransaction();
            $info_model->update([
                'name' => trim($request['first_name']) . ' ' . trim($request['last_name']),
                'first_name' => trim($request['first_name']),
                'last_name' => trim($request['last_name']),
                'active' => $request['active'],
                'email' => trim($request['email']),
                'mobile' => trim($request['mobile']),
                'country' => trim($request['country']),
                'state' => trim($request['state']),
                'city' => trim($request['city']),
                'pincode' => trim($request['pincode']),
                'role' => trim($request['role']),
                'about' => trim($request['about']),
                'linked_in_id' => !empty(trim($request['linkedin'])) ? trim($request['linkedin']) : null,
                'facebook_id' => !empty(trim($request['facebook'])) ? trim($request['facebook']) : null,
                'github_id' => !empty(trim($request['github'])) ? trim($request['github']) : null,
                'image_path' => $fullImagePath, 
            ]);
            if($info_model) {
                DB::commit();
                return redirect()->route('secured.basic.info.get')->with([
                    "status" => "User " . trim($request['first_name']) . ' ' . trim($request['last_name']) . " was updated with status " . $request['active'] . " !"
                ]);
            } else {
                return redirect()->route('secured.basic.info.get')->with('error', 'An error occurred while updating '. trim($request['first_name']) . ' ' . trim($request['last_name']));
            }
        } catch (\Exception $e) {
            DB::rollBack();
            echo json_encode($e->getMessage());
            die;
        }
    }

    // User Delete
    public function basic_information_delete($id) {
        DB::beginTransaction();
        try {
            $user = BasicInformationModel::find($id);
            if (!$user) {
                return redirect()->route('secured.basic.info.get')->with('error','User not found.');
            }
    
            $uploadPath = storage_path('app/public/uploads');
            $imagePath = $uploadPath . '/' . $user->image_path;
            if ($user->image_path && file_exists($imagePath)) {
                unlink($imagePath);
            }
            $delete_data = BasicInformationModel::where('id', $id)->delete();
            if ($delete_data) {
                DB::commit();
                return redirect()->route('secured.basic.info.get')->with('status', 'User deleted successfully!');
            } else {
                return redirect()->route('secured.basic.info.get')->with('status', 'Record not found or already deleted.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('secured.basic.info.get')->with('error', 'An error occurred while deleting the user. ' . $e->getMessage());
        }
    }

    private function checkEmailMobileExists($email, $mobile, $id) {
        $get_data = BasicInformationModel::where(function($query) use ($email, $mobile) {
                        $query->where('mobile', $mobile)
                            ->orWhere('email', $email);
                    })
                    ->where('id', '!=', $id)  
                    ->first();
        if($get_data != null) {
            if($get_data['email'] == $email && $get_data['mobile'] == $mobile) {
                return [
                    'email' => true,
                    'mobile' => true  
                ];
            }
            elseif($get_data['email'] == $email){
                return [
                    'email' => true,
                    'mobile' => false  
                ];
            }
            elseif($get_data['mobile'] == $mobile) {
                return [
                    'email' => false,
                    'mobile' => true  
                ];
            }
        }
        return [
            'email' => false,
            'mobile' => false  
        ];
    }
}
