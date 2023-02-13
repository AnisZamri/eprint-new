<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('customers.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('customers.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */

      public function destroy($id)
{
    $user = User::find($id);
    $user->delete($id);
    return redirect('/')->with('success', 'User account deleted');
}

public function destroyStaff($id)
{
    $user = User::find($id);
    $user->delete($id);
    return redirect('/')->with('success', 'User account deleted');
}
}
