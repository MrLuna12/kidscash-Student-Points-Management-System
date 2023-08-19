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
                        @if(view('add'))
                        <a class="btn btn-success" href="{{strtolower($room->name)}}/students/{{$student->id}}/earn" role="button">Add Points</a>
                        @endif

                        @if(view('spend'))
                            <a class="btn btn-danger" href="{{$room->name}}/students/{{$student->id}}/shop" role="button">Spend Points</a>

                        @endif
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>
