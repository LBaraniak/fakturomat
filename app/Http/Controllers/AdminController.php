<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function changeAccessForUser($user_id)
    {
        if(!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
            return;
        }
        $user = \App\Models\User::findOrFail($user_id);
        $user->is_banned = !$user->is_banned;
        $user->save();

        return redirect()->route('admin.panel')->with('message', 'Zmieniono dostęp dla uzytkownika');
    }
}
