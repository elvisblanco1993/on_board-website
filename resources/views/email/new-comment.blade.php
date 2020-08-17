@component('mail::message')
## Support Ticket

> {{ $comment->comment }}

**Replied by**: {{ $user->name }}

**Title**: {{ $ticket->title }}

**Ticket ID**: {{ $ticket->ticket_id }}

**Status**: {{ $ticket->status }}

You can view your ticket at any time at [{{ url('tickets/'. $ticket->ticket_id) }}]({{ url('tickets/'. $ticket->ticket_id) }})
@endcomponent
