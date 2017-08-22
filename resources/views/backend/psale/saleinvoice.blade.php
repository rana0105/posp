<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sale Invoice</title>
  <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        width: auto;
        font-size: 12px;
        border: 1px solid #000000;
        /*border: none;*/
        text-align: center;
        padding-top: 4px;
        padding-bottom:  5px;
        margin-top: 2px;
        margin-bottom: 2px;
    }
    input {
        border: none;
    }

    textarea {
        border: none;
  }
  </style>
</head>
<body>
        <h1 style="text-align: center;">Sale Invoice</h1>
        <h3 style="text-align: center;">Invoice ID : {{ $sale->id }}</h3>
        <h3 style="text-align: center;">Customer Name : {{ $sale->customers->name }}</h3>
        <h3 style="text-align: center;">Supllier Name : {{ $sale->suppliers->supplier_name}}</h3>
        <h3 style="text-align: center;">Invoice Created By : {{ Auth::user()->name }} </h3>

  <table style="margin-top: 15px; margin-bottom: 15px; float: center;">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Discount</th>
        <th>Vat</th>
        <th>Sub Total</th>
      </tr>
    </thead>
    <tbody>
    @foreach($sin as $s)
      <tr>
        <td>{{ $s->products->name }}</td>
        <td>{{ $s->s_quantity }}</td>
        <td>{{ $s->sunit_price}}</td>
        <td>{{ $s->ppdiscount }}</td>
        <td>{{ $s->svat }}</td>
        <td>{{ $s->sstotal }}</td>
      </tr>
    @endforeach
        
    </tbody>
  </table> 
      <h4 style="text-align: right; margin-right: 70px;">Total Amount : {{ $sale->stotal_amount }}</h4>
      <h4 style="text-align: right; margin-right: 70px;">Payment : {{ $sale->spayment }}</h4>
      <h4 style="text-align: right; margin-right: 70px;">Due :{{ $sale->sdue }}</h4>
</body>
</html>