@extends('layouts.auth')

@section('content')

<div class="container my-5">
    <div class="row" style="padding: 3% 0 3% 0">
        <div class="col-md-10 float-left">
            <h2 class="font-weight-bolder">FINISH SETTING UP YOUR SUPPORT PLAN</h2>
            <p class="lead">This is the last step towards enabling your On_Board support plan.</p>
        </div>
    </div>
    <div class="row d-flex justify-content-center bg-white rounded-lg shadow py-5">
        <div class="col-md-10">

            <script src="https://js.stripe.com/v3/"></script>

            <form action="{{ url('support/get-started') }}" method="POST" id="payment-form">
                @csrf
                @method('PUT')

                {{-- Payment Information --}}
                <div class=" mt-4">
                    <h5 class="mb-0 font-weight-bold"><i class="fas fa-credit-card"></i>  Payment Information</h5>
                    <hr class="mt-1 mb-2">
                    <p>The information below will be used for billing purposes. Invoices will be sent to the Billing Email below, so please make sure the address you enter is monitored. Your account email and billing email can be different if necessary.</p>
                </div>

                <div class="form-row">
                    <div class="form-group mt-2 col-md-6">
                        <label class="text-muted" for="card-holder-name">Name on Card *</label>
                        <input class="form-control" type="text" name="name" id="card-holder-name" placeholder="John Doe">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2 col-md-6">
                        <label class="text-muted" for="billingEmail">Billing Email *</label>
                        <input class="form-control" type="email" name="email" id="billingEmail" placeholder="who@example.com">
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group mt-2 col-md-6">
                        <label class="text-muted" for="subs">Subscription Type *</label>
                        <select class="custom-select" name="subscription" id="subs">
                            <option value="ONBOARD-SUPPORT-ANNUAL-599">Annual ($599/year)</option>
                        </select>
                        @error('subscription')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-2 col-md-6">
                        <label for="card-element" class="text-muted">Card details *</label>
                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element"></div>
                        <small class="text-danger" id="card-error"></small>
                    </div>


                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="text-muted" for="vat">VAT (if applicable)</label>
                        <input class="form-control" type="text" name="vat" id="vat">
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button class="btn btn-success" type="button" id="submit-button" data-secret="{{ $intent->client_secret }}">
                        SUBMIT PAYMENT
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Stripe Card Form --}}
<script>
    window.addEventListener('load', function() {
            const stripe = Stripe('{{ config('services.stripe.key') }}');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('submit-button');
            const clientSecret = cardButton.dataset.secret;

            cardButton.addEventListener('click', async (e) => {
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );
                if (error) {
                    document.querySelector('#card-error').innerHTML = error.message;
                } else {
                    var pm = document.createElement("input");
                    pm.setAttribute('type', 'hidden');
                    pm.setAttribute('name', 'payment_method');
                    pm.setAttribute('value', setupIntent.payment_method);
                    document.querySelector('#payment-form').appendChild(pm);
                    document.querySelector('#payment-form').submit();
                }
            });
        });
</script>

@endsection
