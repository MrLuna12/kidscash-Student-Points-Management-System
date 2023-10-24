<x-layout>
    @vite('resources/css/student-list.css')
    <h1>{{$room->name}} Room</h1>

    {{-- Message --}}
    @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div>
        @livewire('new-student')
    </div>
    <table class="table table-hover" style="width: 100%">
        <caption>List of Students</caption>
        <thead>
        <tr>
            <th>Name</th>
            <th>Points</th>
            <th>Actions</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="align-middle">
        @foreach ($room->students as $student)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->points}}</td>
                    <td>
                        <a class="plus" href="{{strtolower($room->name)}}/students/{{$student->id}}/earn" role="button">
                            <i class="bi bi-plus-circle btn"></i>
                        </a>
                        <a class="minus" href="{{$room->name}}/students/{{$student->id}}/shop" role="button">
                            <i class="bi bi-dash-circle btn"></i>
                        </a>
                    </td>
                    <td class="dropdown">
                        <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black"></i>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="{{strtolower($room->name)}}/students/{{$student->id}}/history">
                                    <i class="bi bi-clock-history" style="color: black">
                                        History
                                    </i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>

