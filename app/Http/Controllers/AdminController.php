<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function changeAccessForUser($user_id)
    {
        if(!Gate::allows('see-admin-panel')) {
            abort(403);
        }
        $user = \App\Models\User::findOrFail($user_id);
        $user->is_banned = !$user->is_banned;
        $user->save();

        return redirect()->route('admin.panel')->with('message', 'Zmieniono dostęp dla uzytkownika');
    }
}
