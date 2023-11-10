<div>
    @vite('resources/css/student-list.css')
    <table class="table table-hover" style="width: 100%">
        <caption>List of Students</caption>
        <thead>
        <tr>
            <th wire:click="sortBy('name')">
                Name
                <i class="bi bi-arrow-up {{$sortField === 'name' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                <i class="bi bi-arrow-down {{$sortField === 'name' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
            </th>
            <th wire:click="sortBy('points')">
                Points
                <i class="bi bi-arrow-up {{$sortField === 'points' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                <i class="bi bi-arrow-down {{$sortField === 'points' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
            </th>
            <th>Actions</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="align-middle">
        @foreach ($students as $student)
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
    <div>
        {{ $students->links() }}
    </div>
</div>
