<h4>Aktivitet siste 30 dager</h4>

<table class="table table-striped" id="activities">
    <thead>
    <tr>
        <th>Tidspunkt</th>
        <th>Hendelse</th>
    </tr>
    </thead>
    <tbody>
    @foreach($activities as $activity)
        <tr>
            <td>{{ $activity->created_at }}</td>
            <td>@include('admin.users.activities.' . $activity->type)</td>
        </tr>
    @endforeach
    </tbody>
</table>

<script type="text/javascript" class="init">
    $(document).ready(function () {
        $('#activities').DataTable({
            "language": {
                "url": "{{ asset('json/datatables/no-NB.json') }}"
            },
            order: [[0, 'desc']],
        });
    });
</script>

