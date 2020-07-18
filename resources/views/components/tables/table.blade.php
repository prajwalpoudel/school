<table class="table">
    <thead class="thead-inverse">
    <tr>
        @foreach($theads as $thead)
            <th>{{ $thead }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $key=>$data)
        <tr>
            @foreach($tbody as $body)
                @if($body == 'key')
                    <th scope="row">{{ $key + 1 }}</th>
                @else
                    <th>{{ $data[$body] ?? $body }}</th>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
