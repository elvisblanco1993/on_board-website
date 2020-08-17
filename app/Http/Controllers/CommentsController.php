<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\NewComment;
use App\Ticket;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment'   => 'required'
        ]);

            $comment = Comment::create([
                'ticket_id' => $request->input('ticket_id'),
                'user_id'    => Auth::user()->id,
                'comment'    => $request->input('comment'),
            ]);

            $ticket = Ticket::find(request('ticket_id'));

            // // send mail if the user commenting is not the ticket owner
            // if ($comment->ticket->user->id !== Auth::user()->id) {
            //     Mail::to( User::find(Auth::user()->id)->email )->send(new NewComment(User::find(Auth::user()->id)->get(), $comment));
            // }

            Mail::to( User::find(Auth::user()->id)->email )->send(new NewComment(User::find(Auth::user()->id)->firstOrFail(), $ticket, $comment));


            return redirect()->back()->with("message", "Your comment has be submitted.");

    }
}
