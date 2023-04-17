<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboardData() 
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('backend.dashboard', compact('userData'));
    }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logged Out Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function showProfile() 
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('backend.show-profile', compact('userData'));
    }


    public function editProfile() 
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('backend.edit-profile', compact('userData'));
    }

    public function storeProfile(Request $request) 
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->username = $request->username;

        if($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/dashboard-profile-images'),$filename);
            $userData->profile_image = $filename;

        }
        $userData->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
    );

        return redirect()->route('show.profile')->with($notification);


    }

    public function changePassword() 
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('backend.change-password',compact('userData'));

    }

    public function updatePassword(Request $request) 
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword)){
            $userData = User::find(Auth::id());
            $userData->password = bcrypt($request->new_password);
            $userData->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else {
            session()->flash('message','Please type the correct old password');
            return redirect()->back();
        }

    }

    public function showAllUsers()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
    
        $usersData = User::all();
        return view('backend.all-users',compact('usersData','userData'));
    }

    public function editUser($userId)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        $editUser = User::find($userId);
        return view('backend.edit-user',compact('editUser', 'userData'));
    }

    public function adminStoreUserProfile(Request $request, $userId )
    {   
        $id = Auth::user()->id;
        $userData = User::find($id);

        $id = $userId;
        $adminStoreUserData = User::find($id);
        $adminStoreUserData->name = $request->name;
        $adminStoreUserData->email = $request->email;
        $adminStoreUserData->username = $request->username;
        $adminStoreUserData->role = $request->role;

        if($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/dashboard-profile-images'),$filename);
            $adminStoreUserData->profile_image = $filename;

        }
        $adminStoreUserData->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
    );

        return redirect()->route('show.all.users')->with($notification);

    }

    public function adminChangeUserPassword($userId)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        $changeUserPassword = User::find($userId);
        return view('backend.admin-change-user-password' ,compact('changeUserPassword', 'userData'));




    }

    public function adminUpdateUserPassword(Request $request, $userId) 
    {
        $validateData = $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

            $userData = User::find($userId);
            $userData->password = bcrypt($request->new_password);
            $userData->save();

            session()->flash('message','Password Updated Successfully');
            return redirect(route('show.all.users'));

    }
}
