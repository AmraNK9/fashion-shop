
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>show success</title>
<style>
  body
  {
    padding-top:40px;
  }
</style>
</head>
<body>
<?php
    include 'header.php';
    ?>
<div class="container">
<div class="row mt-5">
<div class="col-md-12">
<h3>Dear Customer,

<p>You successfully submitted the following products.Thanks for your shopping here</p>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="card">
<div class="card-header bg-info text-center text-white">Customer's Information</div>
<div class="card-body">
<table class="table table-hover">
<tr>
<td>Customer Name</td>
<td>kyaw kyaw</td>
</tr>
<tr>
<td>Customer Phone</td>
<td>09-77777450</td>
</tr>
<tr>
<td>Customer Address</td>
<td>Yangon</td>
</tr>
</table>
</div>
</div>
</div>
<div class="col-md-8">
<div class="card">
<div class="card-header bg-info text-center text-white">Order Information</div>
<div class="card-body">
<table class="table table-hover">
<tr>
<td>Product Name</td>
<td>Unit Price</td>
<td>Quantity</td>
<td>Price</td>
</tr>
 <td>Bioderma</td>
  <td>36000</td>
  <td>3</td> 
  <td>100998</td>                      
<tr>
<td colspan="3" align="right">Total Amount</td>
<td>665555</td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>

</body>
</html>