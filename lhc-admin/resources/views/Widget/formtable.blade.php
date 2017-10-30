<form action="{{$action}}" method="post">
    <table {!! $attributes !!}>
        <thead>
            <tr>
                @foreach($headers as $header)
                <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
            <tr>
                @foreach($row as $item)
                <td>{!! $item !!}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    <input type="hidden" name="type" value="{{$type}}" >
    {{csrf_field()}}
    <button type="submit" class="btn col-md-12 btn-danger">提交</button>
</form>