<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <h1>History Page</h1>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Item</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{$transaction->student->name}}</td>
                @if($transaction->type == 1)
                    <td>earn</td>
                @else
                    <td>spend</td>
                @endif
                <td>{{$transaction->point->name}}</td>
                <td>{{$transaction->amount}}</td>
                <td>{{$transaction->created_at->format('m-d-Y')}}</td>
                <td>{{$transaction->created_at->format('g:i A')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $transactions->links() }}
    </div>
</div>
