<div>
    @if (Session::has('error_message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('error_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form wire:submit.prevent="submitPoints">
        @foreach($points as $point)
            <ul class="list-group">
                <li class="list-group-item">
                    <input wire:model="selectedPoints.{{ $point->id }}"
                           class="form-check-input me-1"
                           type="checkbox" id="{{$point->name}}"
                           value="{{$point->value}}">

                    <label class="form-check-label" for="{{$point->name}}">
                        {{$point->name}}
                        <span class="badge bg-primary rounded-pill">+{{$point->value}}</span>
                    </label>
                </li>
            </ul>
        @endforeach
        <button class="btn btn-primary" type="submit">Submit | Total {{$this->getTotalPoints()}}</button>
{{--            <p>Points Selected : {{ var_export($selectedPoints) }}</p>--}}
    </form>
</div>
