@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Người xuất</th>
            <th>Người nhập</th>
            <th>Tổng sản phẩm</th>
            <th>Tổng tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($exports as $export)
            <tr>
                <td>{{$export->id}}</td>
                <td>{{$export->exporter->name}}</td>
                <td>{{$export->receiver->name}}</td>
                <td>{{$export->total_product}}</td>
                <td>{{$export->total_price}}$</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.export.show', $export->id) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="javascript:;" class="btn btn-danger btn-sm"
                        onclick="removeRow({{$export->id}},'/admin/exports/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection