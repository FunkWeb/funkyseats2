<h4>Sist aktivitet</h4>

<table class="table table-striped">
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
