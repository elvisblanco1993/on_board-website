@extends('layouts.auth')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h4 class="font-weight-bolder text-uppercase">WELCOME, {{ $user->name }}!</h4>

            @if ( session('message') )
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if ($user->subscription('default')->ends_at->isFuture() )
                <div class="alert alert-info">
                    <i class="fas fa-info-circle mr-2"></i>
                    Your current subscription ends {{ $user->subscription('default')->ends_at->diffForHumans() }}. Visit your Billing options for more details.
                </div>
            @endif

        </div>
    </div>
    <div class="row bg-white rounded-lg shadow-sm  py-4 mb-5">
        {{-- Organize account details --}}
        <div class="col-md-12">
            <h5>Account details</h5>
        </div>

        <div class="col-md-6">
            <table class="table table-borderless table-hover">
                <tbody>
                    <tr>
                        <td>
                            <i class="fas fa-building mr-2 text-muted"></i>
                            <strong>Company Name</strong>:
                        </td>
                        <td>
                            {{ $user->company }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fas fa-user-clock mr-2 text-muted"></i>
                            <strong>Timezone</strong>:
                        </td>
                        <td>
                            {{ $user->timezone }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fas fa-flag mr-2 text-muted"></i>
                            <strong>Country code</strong>:
                        </td>
                        <td>
                            {{ $user->country }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fas fa-money-check mr-2 text-muted"></i>
                            <strong>Subscription status</strong>:
                        </td>
                        <td>
                            @if ($user->subscription()->stripe_status === 'active')
                                <span class="badge badge-success">
                                    {{ $user->subscription()->stripe_status }}
                                </span>
                                <small class="text-muted" title="The subscription will be shown as active until you cancel it. Even when you cancel a subscription, it will be shown as active until the period ends.">
                                    <i class="fas fa-info-circle"></i>
                                </small>
                            @else
                                <span class="badge badge-danger">
                                    {{ $user->subscription()->stripe_status }}
                                </span>
                                <small class="text-muted" title="The subscription will be shown as active until you cancel it. Even when you cancel a subscription, it will be shown as active until the period ends.">
                                    <i class="fas fa-info-circle"></i>
                                </small>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-2 offset-4">
            {{-- Link to ticketing system --}}
            <a class="btn btn-primary btn-block my-2" role="link" href="{{ _('my-tickets') }}">
                <i class="fas fa-headset mr-2"></i>
                Tickets
            </a>

            {{-- Billing Portal --}}
            <form action="{{ url('/billing') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success btn-block my-2">
                    <i class="fas fa-wallet mr-2"></i>
                    Billing
                </button>
            </form>

            @if ( is_null( $user->subscription('default')->ends_at ) )
                <button type="button" class="btn btn-sm text-danger text-right btn-block mt-5" data-toggle="modal" data-target="#cancelPlan">
                    Cancel Plan
                </button>

                {{-- Cancel Plan Modal --}}
                <div class="modal fade" id="cancelPlan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="cancelPlanLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelPlanLabel">Cancel Support Subscription</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Are you sure you want to cancel your subscription?</h5>
                            <p>You will still be able to use this support package until this billing period ends.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">I changed my mind</button>
                            <form action="{{ url('/billing') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-wallet mr-2"></i>
                                    Cancel Plan
                                </button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
</div>

@endsection
