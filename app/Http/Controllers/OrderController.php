<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\OrderPlaced;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi data yang dikirim (opsional sesuai kebutuhan)
        $request->validate([
            'total' => 'required|numeric',
        ]);

        // 2. Ambil user yang sedang login atau gunakan user default untuk testing
        $user = Auth::user() ?? User::first();

        // 3. Simpan data order ke database
        $order = Order::create([
            'user_id' => $user ? $user->id : 1,
            'total' => $request->total,
        ]);

        // 4. Panggil (trigger) Event Broadcast setelah order berhasil disimpan
        event(new OrderPlaced($order, $user));

        // 5. Kembalikan respons JSON (untuk Postman/API)
        return response()->json([
            'message' => 'Order berhasil dibuat dan event berhasil di-broadcast!',
            'order' => $order
        ], 200);
    }
}