<?php

namespace App\Http\Controllers\UserCrud;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UpdateUser extends Controller
{
    public function edit(int $id): Response
    {
        $interests = \App\Models\Intrest::all();
        $languages = \App\Models\Language::all();
        
        return response()->view('user.form', [
            'user' => User::findOrFail($id),
            'languages' => $languages,
            'interests' => $interests,
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'id_numder' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:13', 'max:13',
            Rule::unique(User::class)->ignore($user->id)],
            'mobile_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'birth_date' => ['required', 'date'],
            'language' => ['required','string'],
            'interests' => ['required'],
        ]);

        $updated = $user->update($validated);

        if($updated) {
            session()->flash('notif.success', 'User updated successfully!');
            return redirect()->route('all-users');
        }

        return abort(500);
    }
}
