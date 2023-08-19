<x-layout>
    <h1>Rooms</h1>
    @foreach($rooms as $room)
        <option value="{{$room->id}}">{{$room->name}}</option>
        <div class="card w-50">
            <div class="card-body">
              <h5 class="card-title">{{$room->name}}</h5>
              <a href="/rooms/{{strtolower($room->name)}}" class="btn btn-primary">Button</a>
            </div>
          </div>
    @endforeach
</x-layout>
