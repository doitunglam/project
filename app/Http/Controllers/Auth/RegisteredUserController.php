<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $refcodesource = null;
        if ($request->has('refcodesource'))
            $refcodesource = $request->input('refcodesource');
        return view('auth.register',['refcodesource'=>$refcodesource]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'refcode' => ['required', 'string', 'min:5','max:5'],
            'phone' => ['required', 'regex:/^(0)(\d{9})*/', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'email'],

        ]);
        $count = 0;
        $refcodesource = '';
        while ($count < 10) {
            $count++;
            $refcodesource = random_bytes(5);
            $refcodesource = base64_encode($refcodesource);
            $refcodesource = str_replace(['=', '+', '/'], '', $refcodesource);
            $refcodesource = Str::substr($refcodesource,0,5);
            if (User::where('refcodesource', '=', $refcodesource)->count() == 0) break;
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'refcode' => $request->refcode,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'refcodesource' => $refcodesource,
            'refcount'=> 0
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
