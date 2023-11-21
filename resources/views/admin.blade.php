<x-layout>
    @vite('resources/css/admin.css')

    <h1>Admin</h1>

{{--    <ul class="nav nav-tabs">--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link active" aria-current="page" href="{{route('users')}}">Users</a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="/inventory">Inventory</a>--}}
{{--        </li>--}}
{{--    </ul>--}}

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="true">Users</button>
            <button class="nav-link" id="nav-inventory-tab" data-bs-toggle="tab" data-bs-target="#nav-inventory" type="button" role="tab" aria-controls="nav-inventory" aria-selected="false">Inventory</button>

        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab" tabindex="0">
            @livewire('admin-user')
        </div>

        <div class="tab-pane fade" id="nav-inventory" role="tabpanel" aria-labelledby="nav-inventory-tab" tabindex="0">
            @livewire('admin-inventory')
        </div>
    </div>
</x-layout>
