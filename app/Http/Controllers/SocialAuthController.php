<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class SocialAuthController extends Controller
{
    /**
     * Redirect to twitter login
     *
     * @return void
     */
    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Twitter login authentication
     *
     * @return void
     */
    public function loginWithTwitter()
    {
        try {

            $twitterUser = Socialite::driver('twitter')->user();
            // dd($twitterUser);
            $user = User::where('twitter_id', $twitterUser->id)->first();

            // dd($user);
            if ($user) {
                Auth::login($user);

                return redirect('/app/followers');
            } else {
                $createUser = User::create([
                    'name' => $twitterUser->name,
                    'email' => $twitterUser->email,
                    'twitter_id' => $twitterUser->id,
                    'password' => encrypt('test@123')
                ]);
                // dd($createUser);

                Auth::login($createUser);
                return redirect('/app/followers');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
