<div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th wire:click="sortBy('name')">
                Name
                <i class="bi bi-arrow-up {{$sortField === 'name' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                <i class="bi bi-arrow-down {{$sortField === 'name' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
            </th>
            <th wire:click="sortBy('value')">
                Value
                <i class="bi bi-arrow-up {{$sortField === 'value' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                <i class="bi bi-arrow-down {{$sortField === 'value' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
            </th>
            <th wire:click="sortBy('type')">
                Type
                <i class="bi bi-arrow-up {{$sortField === 'type' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                <i class="bi bi-arrow-down {{$sortField === 'type' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
            </th>
            <th wire:click="sortBy('quantity')">
                Quantity
                <i class="bi bi-arrow-up {{$sortField === 'quantity' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                <i class="bi bi-arrow-down {{$sortField === 'quantity' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
            </th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($points as $point)
            <tr>
                <td>{{$point->name}}</td>
                <td>{{$point->value}}</td>

                @if($point->type == 0)
                    <td>Spending</td>
                @else
                    <td>Earning</td>
                @endif

                @if($point->quantity === null)
                    <td>N/A</td>
                @else
                    <td>{{$point->quantity}}</td>
                @endif
                <td>
                    {{--                    <button class="btn btn-success">CREATE</button>--}}
                    <a href="{{route('edit.inventory', $point->id)}}">
                        <i id="actions" class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $points->links() }}
    </div>
</div>
