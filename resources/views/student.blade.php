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

    <div>
        @livewire('student-table')
    </div>
</x-layout>

