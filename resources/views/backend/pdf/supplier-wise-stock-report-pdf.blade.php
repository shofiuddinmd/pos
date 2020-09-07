<!DOCTYPE html>
<html>
<head>
    <title>Supplier wise Stock Report Pdf</title>
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('/')}}backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table width="100%">
                <tbody>
                <tr>
                    {{--                    <td><strong>Invoice No: # {{$invoice->invoice_no}}</strong></td>--}}
                    <td><span style="font-size: 20px; background-color: #ddd;">ABC Shopping Mall</span><br/>
                        Fatullah, Narayanganj</td>
                    <td><span>Showroom No: 01676902988</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr/>
    <br/>
    <div class="row">
        <div class="col-md-12>">
            <table width="100%">
                <tbody>
                <tr>
                    <td width="40%"></td>
                    <td><u><strong>Supplier wise Stock Report</strong></u></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <strong>Supplier Name: </strong>{{$allData['0']['supplier']['name']}}
            <table width="100%" border="1">
                <thead>
                <tr>
                    <th>SL.</th>
{{--                    <th>Supplier Name</th>--}}
                    <th>Category</th>
                    <th>In.qty</th>
                    <th>Out.qty</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Unit</th>
                </tr>
                </thead>

                <tbody>
                @foreach($allData as $key => $product)
                    @php
                        $buying_total = \App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                        $selling_total = \App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                    @endphp
                    <tr>
                        <td>{{$key +1}}</td>
{{--                        <td>{{$product['supplier']['name']}}</td>--}}
                        <td>{{$product['category']['name']}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$buying_total}}</td>
                        <td>{{ $selling_total}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product['unit']['name']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="row">
        <br/>
        <div class="col-md-12">
            <br/>
            <br/>
            <br/>
            <br/>
            {{--            <hr style="margin-bottom: 0px; padding-top: 30px;">--}}
            <table border="0px" width="100%">
                <tbody>
                <tr>
                    <td width="40%" style="text-align: center"></td>
                    <td width="20%"></td>
                    <td width="40%" style="text-align: center"><p style="text-align: right; border-top: 1px solid #000;">Owner Signature</p></td>
                </tr>
                </tbody>
            </table>
            <br/>
        </div>
    </div>
    <br/>
    @php
        $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'));
    @endphp
    <i>Printing Time: {{$date->format('j F Y, g:i a')}}</i>
</div>
</body>
</html>



