<x-app-layout>

    <h3>Personer innsjekket akkurat nå:</h3>

    <table class="table table-striped" id="checkedin">
        <thead>
        <tr>
            <th>Person</th>
            <th>Plass</th>
            <th>Sjekket inn</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th><a href="#">Trygve Svindel</a></th>
            <td><a href="#">Klasserommet</a> - <a href="#">Sete 13</a></td>
            <td>09:55</td>
        </tr>
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

</x-app-layout>
