<?php

namespace Nicelizhi\Manage\Http\Controllers\User;

use Nicelizhi\Manage\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Encryption\Encrypter;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard.index');
        }

        if (strpos(url()->previous(), 'admin') !== false) {
            $intendedUrl = url()->previous();
        } else {
            $intendedUrl = route('admin.dashboard.index');
        }

        session()->put('url.intended', $intendedUrl);

        return view('admin::users.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $remember = request('remember');

        if (! auth()->guard('admin')->attempt(request(['email', 'password']), $remember)) {
            session()->flash('error', trans('admin::app.settings.users.login-error'));

            return redirect()->back();
        }

        if (! auth()->guard('admin')->user()->status) {
            session()->flash('warning', trans('admin::app.settings.users.activate-warning'));

            auth()->guard('admin')->logout();

            return redirect()->route('admin.session.create');
        }

        return redirect()->intended(route('admin.dashboard.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->guard('admin')->logout();

        return redirect()->route('admin.session.create');
    }

    /**
     * 
     * Login from other platforms
     * @param string $platform
     * @param string $token
     * @param string $email
     * @return void
     */
    public function loginByEmail() {
        $token = request('token');
        if(!$token) throw new \Exception("token is required");
        $newEncrypter = new \Illuminate\Encryption\Encrypter(config('app.sync_key'), config('app.cipher'));
        //$plainTextToEncrypt = "nice.lizhi@gmail.com";
        //$encrypted = $newEncrypter->encrypt( $plainTextToEncrypt );
        $decrypted = $newEncrypter->decrypt( $token );


        $user = \Webkul\User\Models\Admin::where('email', $decrypted)->where('status', 1)->first();
        if($user) {
            auth()->guard('admin')->login($user);
            return redirect()->route('admin.dashboard.index');
        }
        
    }
}
