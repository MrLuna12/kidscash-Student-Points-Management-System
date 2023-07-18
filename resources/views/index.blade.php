<x-layout>
        <div class="container">
           <table>
            <tr>
                <th>Name</th>
                <th>Points</th>
            </tr>
            @foreach ($students as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->points}}</td>
            </tr>
            @endforeach
           </table>
        </div>
</x-layout>
