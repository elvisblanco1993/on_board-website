@extends('layouts.auth')

@section('content')

<div class="container" style="padding: 2% 0 3% 0">

    <div class="row">
        <div class="col-md-12 d-flex justify-content-between">
            <h5 class="font-weight-bolder">
                <a href="{{ _('/my') }}" class="text-decoration-none" title="Exit Ticketing System">
                    <i class="fas fa-home mr-3"></i>
                </a>
                My tickets
            </h5>

            <a href="{{ _('/new-ticket') }}">
                New ticket
            </a>

        </div>
        @if ( session('message') )
            <div class="col-md-12 alert alert-success">{{ session('message') }}</div>
        @endif
    </div>

    <div class="row bg-white rounded-lg shadow-sm px-2 py-4">

        <div class="col-md-12">

            @if ($tickets->isEmpty())
            <p>You have not created any tickets.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>
                        @foreach ($categories as $category)
                            @if ($category->id == $ticket->category_id)
                                {{ $category->name }}
                            @endif
                        @endforeach
                        </td>
                        <td>
                            <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                            </a>
                        </td>
                        <td>
                        @if ($ticket->status === 'Open')
                            <span class="badge badge-success">{{ $ticket->status }}</span>
                        @else
                            <span class="badge badge-danger">{{ $ticket->status }}</span>
                        @endif
                        </td>
                        <td>
                            @if ($ticket->priority == 'low')
                                <span class="badge badge-info text-white">{{ $ticket->priority }}</span>
                            @endif
                            @if ($ticket->priority == 'medium')
                                <span class="badge badge-warning">{{ $ticket->priority }}</span>
                            @endif
                            @if ($ticket->priority == 'high')
                                <span class="badge badge-danger">{{ $ticket->priority }}</span>
                            @endif
                        </td>
                        <td>{{ $ticket->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $tickets->render() }}
            @endif

        </div>

    </div>

</div>

@endsection
