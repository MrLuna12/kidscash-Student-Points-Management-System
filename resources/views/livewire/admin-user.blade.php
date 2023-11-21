<div>
{{--            <button class="nav-link {{$activeTab === 'nav-users' ? 'active' : ''}}" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="true">Users</button>--}}
{{--            <button class="nav-link {{$activeTab === 'nav-inventory' ? 'active' : ''}}" id="nav-inventory-tab" data-bs-toggle="tab" data-bs-target="#nav-inventory" type="button" role="tab" aria-controls="nav-inventory" aria-selected="false">Inventory</button>--}}

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
                            <a href="{{route('edit.user', $user->id)}}">
                                <i id="actions" class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div>
                {{ $users->links() }}
            </div>
</div>
