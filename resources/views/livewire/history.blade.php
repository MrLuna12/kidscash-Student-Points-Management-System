<div>
    @vite('resources/css/history-table.css')
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <h1>History Page</h1>
    <a class="btn float-end" href="/rooms/{{strtolower($room->name)}}">
        <i class="bi bi-backspace"> Go Back</i>
    </a>
    <div class="container">
        <h2 class="pt-2">{{$student->name}}</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th wire:click="sortBy('created_at')">
                    Date
                    <i class="bi bi-arrow-up {{$sortField === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('type')">
                    Type
                    <i class="bi bi-arrow-up {{$sortField === 'type' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'type' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('point_id')">
                    Item
                    <i class="bi bi-arrow-up {{$sortField === 'item' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'item' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
{{--                <th>Room</th>--}}
                <th wire:click="sortBy('amount')">
                    Amount
                    <i class="bi bi-arrow-up {{$sortField === 'amount' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'amount' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
{{--                <th wire:click="sortBy('created_at')" >Time</th>--}}
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="align-middle">
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->created_at->format('m-d-Y')}}</td>
                    @if($transaction->type == 1)
                        <td>earn</td>
                    @else
                        <td>spend</td>
                    @endif
                    <td>{{$transaction->point->name}}</td>
{{--                    <td>{{$room->name}}</td>--}}
                    <td>{{$transaction->amount}}</td>
{{--                    <td>{{$transaction->created_at->format('g:i A')}}</td>--}}
                    @if($transaction->type == 0)
                    <td><i class="bi bi-three-dots-vertical btn" style="color: black"></i></td>
                    @else
                        <td> </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $transactions->links() }}
        </div>
    </div>
</div>
