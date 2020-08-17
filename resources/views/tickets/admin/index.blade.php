@extends('layouts.auth')

@section('content')

<div class="container" style="padding: 2% 0 3% 0">

    <div class="row">
        <div class="col-md-12 d-flex justify-content-between">
            <h5 class="font-weight-bolder">
                <a href="{{ _('/my') }}" class="text-decoration-none" title="Exit Ticketing System">
                    <i class="fas fa-home mr-3"></i>
                </a>
                Tickets
            </h5>
        </div>
        @if ( session('message') )
            <div class="col-md-12 alert alert-success">{{ session('message') }}</div>
        @endif
    </div>

    <div class="row bg-white rounded-lg shadow-sm px-2 py-4">

        <div class="col-md 12">
            @if ($tickets->isEmpty())
            <p>There are currently no tickets.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th style="text-align:center">Actions</th>
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
                        <td>{{ $ticket->updated_at }}</td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-sm btn-primary">Comment</a>
                            <form action="{{ url('/close-ticket/' . $ticket->ticket_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Close</button>
                            </form>
                        </td>
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
