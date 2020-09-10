<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class RevokeExistingTokens
{

    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $user = User::find($event->userId);

        $user->tokens()->where('id', '!=', $event->tokenId)
            ->where('user_id', $event->userId)
            ->where('client_id', $event->clientId)
            ->delete();
    }
}
