<?php

namespace Webkul\Admin\Http\Controllers\User;

<<<<<<< HEAD
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Hash;
=======
use Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
use Webkul\Admin\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->guard('admin')->user();

        return view('admin::account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $user = auth()->guard('admin')->user();

        $this->validate(request(), [
            'name'             => 'required',
            'email'            => 'email|unique:admins,email,' . $user->id,
            'password'         => 'nullable|min:6|confirmed',
            'current_password' => 'required|min:6',
<<<<<<< HEAD
            'image.*'          => 'nullable|mimes:bmp,jpeg,jpg,png,webp'
=======
            'image.*'          => 'nullable|mimes:bmp,jpeg,jpg,png,webp',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        $data = request()->only([
            'name',
            'email',
            'password',
            'password_confirmation',
            'current_password',
<<<<<<< HEAD
            'image'
=======
            'image',
>>>>>>> 6db7346497c8511a570d5e8471c9287634998b61
        ]);

        if (! Hash::check($data['current_password'], $user->password)) {
            session()->flash('warning', trans('admin::app.account.edit.invalid-password'));

            return redirect()->back();
        }

        $isPasswordChanged = false;

        if (! $data['password']) {
            unset($data['password']);
        } else {
            $isPasswordChanged = true;

            $data['password'] = bcrypt($data['password']);
        }

        if (request()->hasFile('image')) {
            $data['image'] = current(request()->file('image'))->store('admins/' . $user->id);
        } else {
            if (! isset($data['image'])) {
                if (! empty($data['image'])) {
                    Storage::delete($user->image);
                }

                $data['image'] = null;
            } else {
                $data['image'] = $user->image;
            }
        }

        $user->update($data);

        if ($isPasswordChanged) {
            Event::dispatch('admin.password.update.after', $user);
        }

        session()->flash('success', trans('admin::app.account.edit.update-success'));

        return back();
    }
}
