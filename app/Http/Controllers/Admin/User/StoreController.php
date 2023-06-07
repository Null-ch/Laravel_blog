<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use App\Mail\User\PasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\User\StroreRequest;

class StoreController extends Controller
{
    public function __invoke(StroreRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']],$data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
        return redirect()->route('admin.users.index');
    }
}
