<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $key=>$category)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td> {{ $category->fees[0]->amount }}</td>
        </tr>
    @endforeach
    </tbody>

</table>
