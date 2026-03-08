<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('user-private-channel.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});


// Broadcast::channel('user-typing-channel.{userId}.{adminId}', function ($user, $userId, $adminId) {
//     return (int) $user->id === (int) $userId;
// });
Broadcast::channel('user-typing-channel.{adminId}', function ($user, $adminId) {
    return (int) $user->id === (int) $adminId;
});