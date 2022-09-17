<x-app-layout>

    <h3>Personer innsjekket akkurat nå:</h3>

    @if($checkins->count() > 0)
        <table class="table table-striped" id="checkedin">
            <thead>
            <tr>
                <th>Person</th>
                <th>Plass</th>
                <th>Sjekket inn</th>
            </tr>
            </thead>
            <tbody>
            @foreach($checkins as $checkin)
                <tr>
                    <th><a href="#">{{ $checkin->user->name }}</a></th>
                    <td>Hmm</td>
                    <td>{{ $checkin->checkin_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <script type="text/javascript" class="init">
            $(document).ready(function () {
                $('#checkedin').DataTable({
                    "language": {
                        "url": "{{ asset('json/datatables/no-NB.json') }}"
                    }
                });
            });
        </script>

        @push('head')
            <x-datatables></x-datatables>
        @endpush

    @else
        <p>Ingen personer er sjekket inn for øyeblikket.</p>
    @endif

</x-app-layout>
