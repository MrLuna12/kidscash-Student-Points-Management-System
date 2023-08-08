<div>{{--container--}}
    <div class="row justify-content-center">{{--"row justify-content-center --}}
        <div class="col-md-8">{{--col-md-8 --}}
            <h1>Students</h1>
            <div class="mb-3">
                <select wire:model="selectedRoom" class="form-select" aria-label="Default select example">
                    <option disabled>Rooms</option>
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                    @endforeach
                </select>
            </div>


            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        @if($selectedRoom == $student->room->id)
                            <tr>
                                <td>{{$student->name}}</td>
                                <td>{{$student->points}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
