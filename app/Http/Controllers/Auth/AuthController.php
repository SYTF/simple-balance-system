<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use App\User_sso;
use Auth;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $providerUser = Socialite::driver('facebook')->user();

        $sso = User_sso::where('sso_id', $providerUser->id)->first();
        if(!$sso)
        {
            $user = new User();
            $user->name = $providerUser->name;
            $user->email = $providerUser->email;
            $user->save();

            $sso = new User_sso();
            $sso->sso_id = $providerUser->id;
            $sso->user_id = $user->id;
            $sso->save();

        }else{
            $user = $sso->user;
        }

        Auth::login($user);
        return redirect()->to('/');
    }
}
