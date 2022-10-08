<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Libraries\Meta;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo;


    public function redirectTo()
    {
        if (!empty(Auth::user()->role)) {
            switch (Auth::user()->role) {

                case 1:
                    $this->redirectTo = '/superadmin';
                    return $this->redirectTo;
                    break;
                case 2:
                    $this->redirectTo = '/business';
                    return $this->redirectTo;
                    break;
                case 3:
                    $this->redirectTo = '/customer';
                    return $this->redirectTo;
                    break;


                default:
                    $this->redirectTo = '/login';
                    return $this->redirectTo;
            }
        } else {
            return Socialite::driver('google')->redirect();
        }
    }
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            $msg = array(
                'message' => $e->getMessage(),
                'alert-type' => 'danger'
            );
            return redirect('/login')->with($msg);
        }

        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => date('Y-m-d h:s:i'),
                'google_id' => $user->id,
                'avatar' => $user->avatar,
                'title' => 'Default Address',
                'is_default' => '1',
                'avatar_original' => $user->avatar_original
            ];

            $newUser = User::create($data);
            $newUser->address()->create($data);
            auth()->login($newUser, true);
        }
        if (Session::get('check_session') == 'default') {
            return redirect()->to('/checkout');
        } else {
            return redirect()->to('/customer');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        $meta = Meta::tags();
        return view('auth.login',compact('meta'));
    }
    
}
