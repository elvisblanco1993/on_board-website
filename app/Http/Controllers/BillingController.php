<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function launchPortal(Request $request)
    {
        return $request->user()->redirectToBillingPortal(
            route('my')
        );
    }

    public function cancelSubscription()
    {
        // Cancel the subscription and set an end date for the current subscription.
        $user = User::find( Auth::user()->id );

        $user->subscription('default')->cancel();

        return redirect('my')
            ->with('message', 'Your subscription has been successfully canceled. The current support period ends ' . $user->subscription('default')->ends_at->diffForHumans());
    }
}
