<x-app-layout>
    <h3>Oversikt over alle brukere</h3>

    <table class="table table-hover" id="users">
        <thead>
        <tr>
            <th scope="col">Navn</th>
            <th scope="col">Epost</th>
            <th scope="col">Sist aktiv</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">
                    <img src="{{ $user->avatar_path }}" alt="Profile picture" class="rounded me-2"
                         style="width:50px; height:50px">
                    <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                </th>
                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle">{{ $user->last_active_at }}</td>
                <td class="align-middle"><span class="badge bg-success">Sjekket inn</span></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script type="text/javascript" class="init">
        $(document).ready(function () {
            $('#users').DataTable({
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



