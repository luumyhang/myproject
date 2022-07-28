<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    #invoice {
        padding: 30px;
    }

    .invoice {
        position: relative;
        background-color: #FFF;
        min-height: 680px;
        padding: 15px
    }

    .invoice header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #3989c6
    }

    .invoice .company-details {
        text-align: right
    }

    .invoice .company-details .name {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .contacts {
        margin-bottom: 20px
    }

    .invoice .invoice-to {
        text-align: left
    }

    .invoice .invoice-to .to {
        margin-top: 0;
        margin-bottom: 0
    }

    .invoice .invoice-details {
        text-align: right
    }

    .invoice .invoice-details .invoice-id {
        margin-top: 0;
        color: #3989c6
    }

    .invoice main {
        padding-bottom: 50px
    }

    .invoice main .thanks {
        margin-top: -100px;
        font-size: 2em;
        margin-bottom: 50px
    }

    .invoice main .notices {
        padding-left: 6px;
        border-left: 6px solid #3989c6
    }

    .invoice main .notices .notice {
        font-size: 1.2em
    }

    .invoice table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px
    }

    .invoice table td,
    .invoice table th {
        padding: 15px;
        background: #eee;
        border-bottom: 1px solid #fff
    }

    .invoice table th {
        white-space: nowrap;
        font-weight: 400;
        font-size: 16px
    }

    .invoice table td h3 {
        margin: 0;
        font-weight: 400;
        color: #3989c6;
        font-size: 1.2em
    }

    .invoice table .checkout,
    .invoice table .total,
    .invoice table .checkin {
        text-align: right;
        font-size: 1.2em
    }

    .invoice table .no {
        color: #fff;
        font-size: 1.6em;
        background: #3989c6
    }

    .invoice table .checkin {
        background: #ddd
    }

    .invoice table .total {
        background: #3989c6;
        color: #fff
    }

    .invoice table tbody tr:last-child td {
        border: none
    }

    .invoice table tfoot td {
        background: 0 0;
        border-bottom: none;
        white-space: nowrap;
        text-align: right;
        padding: 10px 20px;
        font-size: 1.2em;
        border-top: 1px solid #aaa
    }

    .invoice table tfoot tr:first-child td {
        border-top: none
    }

    .invoice table tfoot tr:last-child td {
        color: #3989c6;
        font-size: 1.4em;
        border-top: 1px solid #3989c6
    }

    .invoice table tfoot tr td:first-child {
        border: none
    }

    .invoice footer {
        width: 100%;
        text-align: center;
        color: #777;
        border-top: 1px solid #aaa;
        padding: 8px 0
    }

    @media print {
        .invoice {
            font-size: 11px !important;
            overflow: hidden !important
        }

        .invoice footer {
            position: absolute;
            bottom: 10px;
            page-break-after: always
        }

        .invoice>div:last-child {
            page-break-before: always
        }
    }
</style>

<div id="invoice">
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i>In phiếu xuất</button>
        </div>
        <hr>
    </div>

    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col company-details">
                        <h2 class="name">
                            <h3 class="text-primary">
                                Quản Lý Kho ABC
                            </h3>
                        </h2>
                        <div>218 Bạch Đằng, Hải Châu, Đà Nẵng</div>
                        <div>+84 372 563 963</div>
                        <div>contact@myhang.com</div>
                    </div> 
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <h5 class="to">Người xuất: {{$export->exporter->name}}</h5>
                        <h5 class="to">Người nhận: {{$export->receiver->name}}</h5>
                        <h5 class="to">Ngày xuất kho: {{Carbon\Carbon::parse($export->created_at)->format('d/m/Y')}}
                        </h5>
                        <h5 class="to">Giờ xuất kho: {{Carbon\Carbon::parse($export->created_at)->format('H:m:i')}}</h2>
                    </div>
                    <div class="col invoice-details">
                        <div class="date">Ngày in hóa đơn: {{Carbon\Carbon::now()->format('d-m-Y')}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-right">Tên sản phẩm</th>
                            <th class="text-right">Số lượng</th>
                            <th class="text-right">Giá</th>
                            <th class="text-right">Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($export->export_products as $item)
                        <tr>
                            <td class="text-right">{{$item->id}}</td>
                            <td class="text-right">{{$item->product->name}}</td>
                            <td class="text-right">{{$item->quantity}}</td>
                            <td class="text-right">{{$item->price}}$</td>
                            <td class="text-right">{{$item->total_price}}$</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Tổng sản phẩm</td>
                            <td>{{$export->total_product}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Tổng tiền</td>
                            <td>{{$export->total_price}}$</td>
                        </tr>
                    </tfoot>
                </table>
            </main>
            <footer>
                Hóa đơn được tạo trên máy tính và hợp lệ mà không cần chữ ký và con dấu.
            </footer>
        </div>
        <div></div>
    </div>
</div>
<script>
    $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>