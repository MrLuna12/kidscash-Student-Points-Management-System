<x-layout>
    <a href="/rooms/{{strtolower($room->name)}}" class="btn">
        <i class="bi bi-backspace"> Go Back</i>
    </a>

    <h1>{{$student->name}} {{$student->points}}</h1>

    @livewire('points', ['studentId' => $student->id])
</x-layout>
