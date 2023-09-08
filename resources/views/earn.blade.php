<x-layout>

    <h1>{{$student->name}} {{$student->points}}pts</h1>

    @livewire('points', ['studentId' => $student->id])
</x-layout>
