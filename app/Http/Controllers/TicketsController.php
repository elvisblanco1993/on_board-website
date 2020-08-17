<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\NewTicket;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all();

        return view('tickets.index', compact('tickets', 'categories'));
    }


    /**
     * View all tickets (For Administrators)
     */
    public function viewAll()
    {
        $tickets = Ticket::paginate(10);
        $categories = Category::all();

        return view('tickets.admin.index', compact('tickets', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        ]);

        $ticket = new Ticket([
            'title'     => $request->input('title'),
            'user_id'   => Auth::user()->id,
            'ticket_id' => strtoupper(Str::random(10)),
            'category_id'  => $request->input('category'),
            'priority'  => $request->input('priority'),
            'message'   => $request->input('message'),
            'status'    => "Open",
        ]);

        $ticket->save();

        Mail::to( User::find(Auth::user()->id)->email )->send(new NewTicket(User::find(Auth::user()->id)->name, $ticket));

        return redirect()->back()->with("message", "A ticket with ID: #$ticket->ticket_id has been opened.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($ticket)
    {
        $ticket = Ticket::where('ticket_id', $ticket)->firstOrFail();
        $category = $ticket->category;
        $comments = $ticket->comments;

        if (Auth::user()->is_admin == '1') {
            return view('tickets.admin.show', compact('ticket', 'category', 'comments'));
        }

        return view('tickets.show', compact('ticket', 'category', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    /**
     * Close Ticket
     */
    public function close($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();


        $ticket->status = 'Closed';

        $ticket->save();

        return redirect()->back()->with("message", "The ticket has been closed.");
    }
}
