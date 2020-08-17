<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1) {

            return view('backend.admin.index', [
                'user' => User::find(Auth::user()->id),
                'customers' => User::where('is_admin', '0')->get(),
            ]);

        } else {

            // Check if a subscription already exists
            $stripeId = Auth::user()->stripe_id;


            if (isset($stripeId) && ! empty( $stripeId )) {

                $user = User::find(Auth::user()->id);

                // Check if the user has a payment method
                if ($user->hasPaymentMethod()) {

                    // Check if the user has a Default Payment Method
                    if ($user->hasDefaultPaymentMethod()) {

                        // Check if is subscribed
                        if ($user->subscribed('default')) {

                            if (null == $user->subscription('default')->ends_at || ! $user->subscription('default')->ends_at->isPast() ) {

                                /**
                                 * Success
                                 * @return redirect to Dashboard
                                 */
                                return view('backend.my', [
                                    'user' => $user,
                                ]);

                            } else {

                                return redirect('/');

                            }


                        } else {
                            /**
                             * Redirect to Billing Portal
                             */
                            return $this->launch_billing_portal($user);
                        }

                    } else {
                        /**
                         * Redirect to Billing Portal
                         */
                        return $this->launch_billing_portal($user);
                    }
                } else {
                    /**
                     * Redirect to Billing Portal
                     */
                    return $this->launch_billing_portal($user);
                }
            }

            $user = User::find( Auth::user()->id );
            return view('support.start-subscription', [
                'intent' => $user->createSetupIntent()
            ]);

        }

    }


    /**
     * Redirect to Billing Portal
     */
    public function launch_billing_portal($user)
    {
        return $user->redirectToBillingPortal(
            route('my')
        );
    }
}
