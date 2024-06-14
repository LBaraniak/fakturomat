<?php

namespace App\Actions\Custom;

use Carbon\Carbon;

class BanInactiveUser
{
    public function __invoke()
    {
        $users = \App\Models\User::where('is_banned', 0)->whereDate('created_at','<', Carbon::now()->subDays(30))->get();
        foreach ($users as $user) {
            $invoicesCount = \App\Models\Invoice::where('user_id', $user->id)->count();
            if ($invoicesCount < 1) {
                $user->is_banned = 1;
                $user->save();
            }
        }
    }
}
