<div>
    @vite('resources/css/history-table.css')
    <h1>History Page</h1>
    <a class="btn float-end" href="/rooms/{{strtolower($room->name)}}">
        <i class="bi bi-backspace"> Go Back</i>
    </a>
    <div class="container">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h2 class="pt-2">{{$student->name}} {{$student->points}}</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th wire:click="sortBy('created_at')">
                    Date
                    <i class="bi bi-arrow-up {{$sortField === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('point_id')">
                    Item
                    <i class="bi bi-arrow-up {{$sortField === 'item' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'item' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('amount')">
                    Amount
                    <i class="bi bi-arrow-up {{$sortField === 'amount' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'amount' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th wire:click="sortBy('type')">
                    Type
                    <i class="bi bi-arrow-up {{$sortField === 'type' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                    <i class="bi bi-arrow-down {{$sortField === 'type' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                </th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="align-middle">
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{$transaction->created_at->format('m-d-Y')}}</td>
                    <td>{{$transaction->point->name}}</td>
                    @if($transaction->type === 'Spent')
                        <td style="color: red">{{-$transaction->amount}}</td>
                    @else
                        <td>{{$transaction->amount}}</td>
                    @endif
                    <td>
                        @if($transaction->type === 'Spent')
                            <span class="badge text-bg-danger">{{$transaction->type}}</span>
                        @else
                            <span class="badge text-bg-success">{{$transaction->type}}</span>
                        @endif
                    </td>
                    @if($transaction->type === 'Spent')
                        <td class="dropdown">
                            <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black"></i>
                            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                                <li wire:click="confirmRefund({{$transaction->id}})" class="dropdown-item">
                                        Refund
                                        <i class="bi bi-box-arrow-right" style="color: black"></i>
                                </li>
                            </ul>
                        </td>
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

@push('scripts')
    <script>
        Livewire.on('show-refund-modal', (transactionId) => {
            Swal.fire({
                title: 'Confirm Refund?',
                text: 'Please confirm to continue',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                @this.call('refund', transactionId);
                }
            });
        });
    </script>

    <script>
        Livewire.on('show-refund-success', () => {
            Swal.fire({
                title: 'Success',
                text: 'The Refund was processed',
                icon: 'success',
                confirmButtonText: 'OK',
            })
        });
    </script>
@endpush
