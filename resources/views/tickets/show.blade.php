@extends('layouts.auth')

@section('content')

<div class="container" style="padding: 2% 0 3% 0">
    <div class="row">
        <div class="col-md-12">
            <h5 class="font-weight-bolder">
                <a href="{{ _('/my-tickets') }}" class="text-decoration-none">
                    <i class="fas fa-arrow-left mr-3"></i>
                </a>
                Ticket details
            </h5>
        </div>
        @if ( session('message') )
            <div class="col-md-12 alert alert-success">{{ session('message') }}</div>
        @endif
    </div>
    <div class="row bg-white rounded-lg shadow-sm px-2 py-4">
        <div class="col-md-12">
            <p class="font-weight-bold text-muted">
                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
            </p>
            <p><strong>Category</strong>: {{ $category->name }}</p>
            <p>
                @if ($ticket->status === 'Open')
                    <strong>Status</strong>: <span class="badge badge-success">{{ $ticket->status }}</span>
                @else
                    <strong>Status</strong>: <span class="badge badge-danger">{{ $ticket->status }}</span>
                @endif
            </p>
            <p><strong>Created</strong>: {{ $ticket->created_at->diffForHumans() }}</p>
            <p>{{ $ticket->message }}</p>
        </div>
        <div class="col-md-12">
            <hr>

            <div class="comments">
                @foreach ($comments as $comment)
                    <div class="my-2 rounded @if($ticket->user->id == $comment->user_id) {{'bg-dark text-light'}}@else{{'bg-secondary text-light'}}@endif">
                        <div class="mx-2 badge @if($ticket->user->id == $comment->user_id) {{'badge-secondary'}}@else{{'badge-dark'}}@endif">
                            {{ $comment->user->name }}
                            <span class="">{{ $comment->created_at->format('Y-m-d') }}</span>
                        </div>

                        <div class="px-2">
                            {{ $comment->comment }}
                        </div>
                    </div>
                @endforeach
            </div>

            <label for="comment">Write a comment</label>

            <form action="{{ url('comment') }}" method="POST">
                @csrf

                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                <div class="form-group{{ $errors->has('comment') ? ' invalid' : '' }}">
                    <textarea rows="6" id="comment" class="form-control" name="comment"></textarea>

                    @error('comment')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
