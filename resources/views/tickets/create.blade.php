@extends('layouts.auth')

@section('content')

<div class="container" style="padding: 2% 0 3% 0">
    <div class="row">
        <div class="col-md-12">
            <h5 class="font-weight-bolder">
                <a href="{{ _('/my-tickets') }}" class="text-decoration-none">
                    <i class="fas fa-arrow-left mr-3"></i>
                </a>
                New ticket</h5>
        </div>
        @if ( session('message') )
            <div class="col-md-12 alert alert-success">{{ session('message') }}</div>
        @endif
    </div>

    <div class="row bg-white rounded-lg shadow-sm px-2 py-4">

        <div class="col-md-12">
            <form method="POST" action="{{ url('/new-ticket') }}">
                @csrf

                <div class="form-group{{ $errors->has('title') ? ' invalid' : '' }}">
                    <label for="title">Title</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">

                    @error('title')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group{{ $errors->has('category') ? ' invalid' : '' }}">
                    <label for="category">Category</label>
                    <select id="category" type="category" class="custom-select" name="category">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                    <label for="priority">Priority</label>
                    <select id="priority" type="" class="custom-select" name="priority">
                        <option value="">Select Priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>

                    @error('priority')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                    <label for="message">Message</label>

                    <textarea rows="10" id="message" class="form-control" name="message"></textarea>
                    @error('message')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-ticket"></i> Open Ticket
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
