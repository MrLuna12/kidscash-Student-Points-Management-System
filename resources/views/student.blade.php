<x-layout>
    <h1>{{$room->name}} Room</h1>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Points</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($room->students as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->points}}</td>
                    <td>
                        <a class="btn btn-success" href="/students/add" role="button">Add Points</a>
                        <a class="btn btn-danger" href="/students/spend" role="button">Spend Points</a>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>
