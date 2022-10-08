<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;
use App\Models\Admin\Page;
use View;
class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    protected $redirectTo;
    
    public function __construct(){
        $fpage = Page::get();
        View::share(compact('fpage'));
    }
    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password,'status'=>0])) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
              switch(Auth::user()->role){
            
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
        }
    }
}