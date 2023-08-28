<x-layout>
    <h1>{{$room->name}} Room</h1>

    {{-- Message --}}
    @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                        <a class="btn btn-success" href="{{strtolower($room->name)}}/students/{{$student->id}}/earn" role="button">Add Points</a>

                        <a class="btn btn-danger" href="{{$room->name}}/students/{{$student->id}}/shop" role="button">Spend Points</a>

                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>

