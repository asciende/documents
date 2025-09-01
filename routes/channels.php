<?php

use Illuminate\Support\Facades\Broadcast;
use Pusher\Pusher;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('cm-rama-docs', function ($user, $id) {
    return $user !== null;
});
