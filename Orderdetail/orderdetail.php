<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
</head>

<body>
    <?php include __DIR__.'/../views/layouts/header.php'; ?>
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
                    <div class="card-header bg-success text-center text-white">Customer's Information</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Customer Name</td>
                                <td><?php echo $_SESSION['user_name'] ?></td>
                            </tr>
                            <!-- $orderInfo = [
                'user_id' => $_SESSION['user_id'], // Assuming logged-in user
                'address' => $address,
                'payment_method' => $paymentMethod,
                'items' => $_SESSION['cart'],
                'total' => $this->calculateTotal($_SESSION['cart'])
            ]; -->
                            <tr>
                                <td>Customer Email</td>
                                <td><?php echo $_SESSION['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Customer Address</td>
                                <td><?php echo $orderInfo['address'] ?></td>
                            </tr>
                            <tr>
                                <td>Order Status</td>
                                <td><?php echo $orderInfo['status'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-center text-white">Order Information</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Product Name</td>
                                <td>Unit Price</td>
                                <td>Quantity</td>
                                <td>Price</td>
                                

                            </tr>

                            <?php  foreach ($orderInfo['items'] as $item):  ?>
                            <tr>
                                <td> <?php  echo $item['name'] ?></td>
                                <td><?php  echo $item['price'] ?></td>
                                <td><?php  echo $item['quantity'] ?></td>
                                <td><?php echo $item['price'] * $item['quantity']?></td>
                            </tr>

                            <?php endforeach;?>

                        
                            <tr>
                                <td colspan="3" align="right">Total Amount</td>
                                <td><?php echo $orderInfo['total'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include __DIR__.'/../views/layouts/footer.php'; ?>

</body>

</html>