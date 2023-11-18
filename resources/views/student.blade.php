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
{{--        <a href="/rooms/{{strtolower($room->name)}}/add" class="btn btn-primary float-end mb-3">--}}
{{--            <i class="bi bi-plus-circle"> Add student</i>--}}
{{--        </a>--}}
        @livewire('new-student', ['room' => $room])
    </div>

    <div>
        @livewire('student-table', ['room' => $room])
    </div>
</x-layout>

