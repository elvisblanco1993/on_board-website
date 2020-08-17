@component('mail::message')
## Support Ticket Information

Thank you {{ Str::ucfirst($name) }} for contacting our support team. A support ticket has been opened for you. You will be notified when a response is made by email.
The details of your ticket are shown below:

Title: {{ $ticket->title }}

Priority: {{ $ticket->priority }}

Status: {{ $ticket->status }}

You can view the ticket at any time at [{{ url('tickets/'. $ticket->ticket_id) }}]({{ url('tickets/'. $ticket->ticket_id) }})

@endcomponent
