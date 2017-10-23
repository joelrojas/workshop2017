<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl">
        <div class="row">
            <div class="col-sm-6">
                <h5>From:</h5>
                <address>
                    <strong>Text Bussine.</strong><br>Text text text<br> Text text text<br> Text text text<br>
                    <abbr>Email:</abbr> Text text text
                </address>
            </div>
            <div class="col-sm-6 text-right">
                <span>To:</span>
                <address>
                    <strong>Text Client</strong><br> Text text text<br>Text, Text<br>
                    ZipCode: 213211               </address>
                <p>
                <h4>Invoice No.</h4>
                <h4 class="text-navy">ONL 1</h4>
                <span><strong>Invoice Date:</strong> 2016-02-11</span><br/></p>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                    <tr>
                        <th>Item List</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $key)
                        <tr>

                            <td>{{ $key->state }}</td>
                            <td>{{ $key->dateEnd }}</td>
                            <td>{{ $key->dateBegin }}</td>
                            <td>{{ $key->date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>40.00 Ä</td>
            </tr>
            </tbody>
        </table>
        <div class="well m-t">
            Status: <strong> Paid</strong> with PayPal. Transaction Id: <b>23121916DP218503E</b>
        </div>
    </div>
</div>
</body>
</html>