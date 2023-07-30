<div>
    <select wire:model="selectedRoom" class="form-select" aria-label="Default select example">
        <option disabled>Rooms</option>
        @foreach($rooms as $room)
            <option value="{{$room->id}}">{{$room->name}}</option>
        @endforeach
    </select>
{{--    <h4>Room: @json($selectedRoom)</h4>--}}

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Points</th>
            <th>Room</th>
        </tr>
        @foreach ($students as $student)
            @if($selectedRoom == $student->room->id)
                <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->points}}</td>
                    <td>{{$student->room->name}}</td>
                </tr>
            @endif
        @endforeach
    </table>
</div>
