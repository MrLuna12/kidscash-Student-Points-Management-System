<div>
    @vite('resources/css/admin.css')

    <h1>Admin</h1>

    <div class="container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th wire:click="sortBy('name')">
                    Name
                    <i class="bi bi-arrow-up {{$sortField === 'name' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'name' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('email')">
                    Email
                    <i class="bi bi-arrow-up {{$sortField === 'email' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'email' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('role')">
                    Role
                    <i class="bi bi-arrow-up {{$sortField === 'role' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'role' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('room_name')">
                    Rooms
                    <i class="bi bi-arrow-up {{$sortField === 'rooms' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'rooms' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    @if($user->role == 0)
                        <td>User</td>
                    @else
                        <td>Admin</td>
                    @endif

                    @if($user->room_name == null)
                        <td>No Rooms Assigned</td>
                    @else
                        <td>{{$user->room_name}}</td>
                    @endif
                    <td>
                        {{--                    <button class="btn btn-success">CREATE</button>--}}
                        <a href="{{route('admin.edit', $user->id)}}">
                            <i id="actions" class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
{{--            @empty--}}
{{--                <tr>--}}
{{--                    <td colspan="5">No users found</td>--}}
{{--                </tr>--}}
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $users->links() }}
        </div>
    </div>
</div>
