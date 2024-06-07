<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportUsers()
    {
        if(!Gate::allows('see-admin-panel')) {
            abort(403);
        }
        return Excel::download(new UsersExport, 'users.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
