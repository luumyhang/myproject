@extends('admin.main')

@section('head')
@endsection

@section('content')
<div class="card-body">
    <div class="form-group">
        <label for="menu">Tên Người Xuất</label>
        <p class="fw-bold px-3">{{ $export->exporter->name }}</p>
    </div>

    <div class="form-group">
        <label for="menu">Tên Người Nhận</label>
        <p class="fw-bold px-3">{{ $export->receiver->name }}</p>
    </div>

    <div class="form-group">
        <label for="menu">Ngày xuất kho</label>
        <p class="fw-bold px-3">{{ \Carbon\Carbon::parse($export->created_at)->format('d/m/Y') }}</p>
    </div>

    <div class="form-group">
        <label for="menu">Giờ xuất kho</label>
        <p class="fw-bold px-3">{{ \Carbon\Carbon::parse($export->created_at)->format('H:m:i') }}</p>
    </div>

    <div class="form-group">
        <label for="menu">Danh sách sản phẩm</label>
        <table class="table">
            <thead>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
            </thead>
            <tbody>
                @foreach ($export->export_products as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->total_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.export.bill', $export->id) }}" target="_blank">
                <button class="btn btn-block btn-success btn-flat" id="export-bill">In hóa đơn</button>
            </a>
        </div>
    </div>

</div>
@endsection

@section('footer')

@endsection