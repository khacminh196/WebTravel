<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangeContactRequest;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    protected $userRepo;

    public function __construct(
        User $userRepo
    )
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        return view('admin.setting.index');
    }

    public function changePasswordForm()
    {
        return view('admin.setting.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $newPassword = $request->password;
        $this->userRepo->where([['id', Auth::id()]])->update(['password' => bcrypt($newPassword)]);
        Session::flash('updatePWSuccess', trans('messages.UPDATE_PASSWORD_SUCCESS'));
        Auth::logout();
        
        return redirect()->route('admin.login');
    }

    public function changeContactForm()
    {
        return view('admin.setting.change-contact');
    }

    public function changeContact(ChangeContactRequest $request)
    {
        $credentials = $request->only('address', 'phone', 'email', 'website');
        Contact::where('id', 1)->update($credentials);
        Session::flash("dataSuccess", [
            "msg" => trans('messages.UPDATE_SUCCESS')
        ]);
        
        return redirect()->back();
    }
}
