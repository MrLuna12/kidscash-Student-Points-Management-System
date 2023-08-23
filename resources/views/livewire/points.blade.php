<div>
    <form wire:submit.prevent="submitPoints">
        @foreach($points as $point)
            <ul class="list-group">
                <li class="list-group-item">
                    <input wire:model="selectedPoints.{{ $point->id }}" class="form-check-input me-1" type="checkbox" id="{{$point->name}}" value="{{$point->value}}">
                    <label class="form-check-label" for="{{$point->name}}">
                        {{$point->name}}
                        <span class="badge bg-primary rounded-pill">+{{$point->value}}</span>
                    </label>
                </li>
            </ul>
        @endforeach
        <p>Points Selected : {{ var_export($selectedPoints) }}</p>
        <button class="btn btn-primary" type="submit">Submit | Total {{$this->getTotalPoints()}}</button>
    </form>
</div>
