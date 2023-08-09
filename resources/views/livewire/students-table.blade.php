<div class="container">{{--container--}}
    <h1>Students</h1>
    <div class="justify-content-center">{{--"row justify-content-center --}}
        <div>{{--col-md-8 --}}
            <div class="mb-3">
                <select wire:model="selectedRoom" class="form-select" aria-label="Default select example">
                    <option disabled>Rooms</option>
                    @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Points</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            @if($selectedRoom == $student->room->id)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->points}}</td>
                                    <td>
                                        <a class="btn btn-success" href="/students/add" role="button">Add Points</a>
                                        <a class="btn btn-danger" href="/students/spend" role="button">Spend Points</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
