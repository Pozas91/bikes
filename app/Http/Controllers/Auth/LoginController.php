<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;

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
    protected $redirectTo = '/bikes';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param string $provider
     * @return Response
     */
    public function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.
     *
     * @param string $provider
     * @return Response
     */
    public function handleProviderCallback(string $provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::where('email', $providerUser->email)->first();

        if(is_null($user)) {
            $user = new User();
            $user->setAttribute('name', $providerUser->name);
            $user->setAttribute('password', bcrypt($providerUser->token));
            $user->setAttribute('email', $providerUser->email);
            $user->save();
        }

        auth()->login($user, true);

        return redirect()->intended($this->redirectTo);
    }
}
