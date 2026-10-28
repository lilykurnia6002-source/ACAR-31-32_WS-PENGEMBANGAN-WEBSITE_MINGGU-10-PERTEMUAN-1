<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Events\OrderPlaced;

\Illuminate\Support\Facades\Route::get('/test-broadcast', function () {
    $user = User::first() ?? User::factory()->create();
    $order = \App\Models\Order::create([
        'user_id' => $user->id,
        'total' => 50000
    ]);

    event(new OrderPlaced($order, $user));

    return "Event OrderPlaced berhasil di-trigger secara manual!";
});