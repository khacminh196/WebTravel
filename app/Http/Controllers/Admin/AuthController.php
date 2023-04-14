<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\SendMailResetPasswordRequest;
use App\Jobs\SendMail;
use App\Models\PasswordReset;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Services\MailService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    protected $mailService;
    protected $userRepo;
    public function __construct(
        MailService $mailService,
        UserRepository $userRepo
    )
    {
        $this->mailService = $mailService;
        $this->userRepo = $userRepo;
    }

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = Constant::ROLE_USER['ADMIN'];

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.home');
        }

        Session::flash('dataErrorLogin', 'Incorrect username or password');

        return redirect()->route('admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function formSendMailReset()
    {
        return view('admin.reset-password-mail');
    }

    public function sendMailReset(SendMailResetPasswordRequest $request)
    {
        $email = $request->email;
        $checkEmailError = $this->mailService->checkEmailReset($email);

        DB::beginTransaction();
        if (!$checkEmailError) {
            try {
                SendMail::dispatch(Constant::SEND_MAIL_TYPE['RESET_PASSWORD'], [
                    'email-reset' => $email
                ]);
                Session::flash('sendMailSuccess', 'Please check mail to reset password !');
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Session::flash('dataErrorReset', 'SERVER ERROR !');
            }
        } else { 
            Session::flash('dataErrorReset', 'An email to reset your password has been sent, please check and follow the instructions.');
        }
            

        return redirect()->route('admin.password.reset');
    }

    public function formResetPassword(Request $request)
    {
        $emailReset = PasswordReset::where([
            ['token', $request->token],
            ['time_exists', '>=', Carbon::now()]
        ])->orderBy('created_at', 'DESC')->first();

        if ($emailReset) {
            return view('admin.reset-password', compact('emailReset'));
        } else {
            Session::flash('dataErrorReset', 'The time limit for password reset has expired, please enter your email again.');
            return redirect()->route('admin.password.reset');
        }
    }

    public function resetPassword(ChangePasswordRequest $request)
    {
        $newPassword = $request->password;
        $email = $request->email;
        DB::beginTransaction();
        try {
            $this->userRepo->where([['email', $email]])->update(['password' => bcrypt($newPassword)]);
            PasswordReset::where('email', $email)->delete();
            Session::flash('updatePWSuccess', trans('messages.UPDATE_PASSWORD_SUCCESS'));
            DB::commit();
            return redirect()->route('admin.login');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('dataErrorReset', 'SERVER ERROR !');
            return redirect()->route('admin.password.reset');
        }
    }
}
