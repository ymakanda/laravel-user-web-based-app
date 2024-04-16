<?php

namespace App\Http\Controllers\UserCrud;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ViewUser extends Controller
{
    public function __invoke(Request $request, string $id)
    {
        return response()->view('user.show', [
            'user' => User::findOrFail($id),
        ]);
    }

}
