<x-layout>
        <a href="/rooms/{{strtolower($room->name)}}" class="btn">
            <i class="bi bi-backspace"> Go Back</i>
        </a>
        <h1>I am the earning points page</h1>
{{--    {{$student}}--}}

    @foreach($points as $point)
        <ul class="list-group">
            <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="" id="">
                <label class="form-check-label" for="firstCheckbox">
                    {{$point->name}}
                    <span class="badge bg-primary rounded-pill">{{$point->value}}</span>
                </label>
            </li>
        </ul>
    @endforeach
</x-layout>
