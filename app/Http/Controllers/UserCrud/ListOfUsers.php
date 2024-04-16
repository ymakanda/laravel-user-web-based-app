<?php

namespace App\Http\Controllers\UserCrud;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListOfUsers extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->view('user.all-users', [
            'allUsers' => User::orderBy('updated_at', 'desc')->limit(10)->get(),
        ]);
    }
}
