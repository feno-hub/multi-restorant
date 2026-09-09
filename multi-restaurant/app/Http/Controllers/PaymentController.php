<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{

    public function showOrderPayment(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        $payment = Payment::where('order_id', $order->id)
            ->where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        if (!$payment) {
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'reservation_id' => null,
                'amount' => $order->total,
                'method' => null,
                'status' => 'pending',
                'transaction_id' => null,
                'paid_at' => null,
            ]);
        }

        return view('pages.payments.create', compact('payment', 'order'));
    }

    public function payOrder(Request $request, Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        $request->validate([
            'method' => 'required|in:mvola,orange_money,airtel_money',
        ]);

        $transactionId = 'SIM-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(6));

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'reservation_id' => null,
            'amount' => $order->total,
            'method' => $request->method,
            'status' => 'paid',
            'transaction_id' => $transactionId,
            'paid_at' => now(),
        ]);

        return redirect()
            ->route('client.payment.success', $payment)
            ->with('success', 'Paiement simulé effectué avec succès.');
    }

    // public function showReservationPayment(Reservation $reservation)
    // {
    //     abort_unless($reservation->user_id === Auth::id(), 403);

    //     $payment = Payment::where('order_id', $reservation->id)
    //         ->where('user_id', Auth::id())
    //         ->where('status', 'pending')
    //         ->first();

    //     if (!$payment) {
    //         $payment = Payment::create([
    //             'user_id' => Auth::id(),
    //             'order_id' => null,
    //             'reservation_id' => null,
    //             'amount' => $reservation->total,
    //             'method' => null,
    //             'status' => 'pending',
    //             'transaction_id' => null,
    //             'paid_at' => null,
    //         ]);
    //     }

    //     return view('pages.payments.reservation-payment', compact('payment', 'reservation'));
    // }

    public function payReservation(Request $request, Reservation $reservation)
    {
        abort_unless($reservation->user_id === Auth::id(), 403);

        $request->validate([
            'method' => 'required|in:mvola,orange_money,airtel_money',
        ]);

        $transactionId = 'SIM-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(6));

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'order_id' => null,
            'reservation_id' => $reservation->id,
            'amount' => $reservation->total,
            'method' => $request->method,
            'status' => 'paid',
            'transaction_id' => $transactionId,
            'paid_at' => now(),
        ]);

        return redirect()
            ->route('client.payment.success', $payment)
            ->with('success', 'Paiement simulé effectué avec succès.');
    }

    public function success(Payment $payment)
    {
        abort_unless($payment->user_id === Auth::id(), 403);

        return view('pages.payments.success', compact('payment'));
    }
}
