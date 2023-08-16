<x-layout>
    @foreach($rooms as $room)
        <option value="{{$room->id}}">{{$room->name}}</option>
        <div class="card w-50">
            <div class="card-body">
              <h5 class="card-title">{{$room->name}}</h5>
              <a href="/{{ strtolower($room->name) }}/students" class="btn btn-primary">Button</a>
            </div>
          </div>
    @endforeach
</x-layout>
