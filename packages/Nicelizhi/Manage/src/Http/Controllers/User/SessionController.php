<?php

namespace Nicelizhi\Manage\Http\Controllers\User;

use Nicelizhi\Manage\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (auth()->guard('manage')->check()) {
            return redirect()->route('manage.dashboard.index');
        }

        if (strpos(url()->previous(), 'manage') !== false) {
            $intendedUrl = url()->previous();
        } else {
            $intendedUrl = route('manage.dashboard.index');
        }

        session()->put('url.intended', $intendedUrl);

        return view('manage::users.sessions.create');
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

        if (! auth()->guard('manage')->attempt(request(['email', 'password']), $remember)) {
            session()->flash('error', trans('manage::app.settings.users.login-error'));

            return redirect()->back();
        }

        if (! auth()->guard('manage')->user()->status) {
            session()->flash('warning', trans('manage::app.settings.users.activate-warning'));

            auth()->guard('manage')->logout();

            return redirect()->route('manage.session.create');
        }

        return redirect()->intended(route('manage.dashboard.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->guard('manage')->logout();

        return redirect()->route('manage.session.create');
    }
}
