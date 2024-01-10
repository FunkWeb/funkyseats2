<x-mail::message>
# Velkommen til bookingsystemet!

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Hilsen,<br>
{{ config('app.name') }}
</x-mail::message>
