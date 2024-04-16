<?php

namespace App\Http\Controllers\UserCrud;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DeleteUser extends Controller
{
    public function delete(Request $request, int $id): View
    {
        $user = User::findOrFail($id);

        return view('user.delete-user-form', compact('user'));
    }
    
    public function destroy(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $delete = $user->delete($user->id);

        if($delete) {
            return redirect()->route('all-users');
        }
        return abort(500);
    }
}
