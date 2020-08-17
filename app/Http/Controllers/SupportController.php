<?php

namespace App\Http\Controllers;

use App\Mail\NewCustomer;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{

    use Notifiable;
    use Billable;

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Get Started Form
     */
    public function getStarted()
    {
        return view('support.get-started');
    }

    /**
     * Setup Subscription
     */
    public function setupPlan(Request $request)
    {
        /**
         * Perform initial validation
         */
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subscription' => ['required', 'string'],
            'payment_method' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $paymentMethod = $request->payment_method;

        $user->newSubscription('default', 'price_1HE512GdZW6fMUNzx4RhPi9j')->create($paymentMethod);

        return redirect()->route('my');
    }

}
