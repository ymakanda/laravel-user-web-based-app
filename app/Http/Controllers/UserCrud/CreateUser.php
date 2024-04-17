<?php

namespace App\Http\Controllers\UserCrud;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use App\Events\UserAddedEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Mail;

class CreateUser extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $interests = \App\Models\Intrest::all();
        $languages = \App\Models\Language::all();

        return view('user.create-form',['interests' =>$interests, 'languages' =>$languages]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

         $validated['interests'] = json_encode($request['interests'], true);

        $user= User::create($validated);
        
        if($user) {

            event(new UserAddedEvent($user));

            return redirect()->route('all-users');
        }

        return abort(500);
    }

}
