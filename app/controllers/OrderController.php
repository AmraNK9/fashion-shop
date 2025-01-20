<?php
// CartController.php
include_once __DIR__ . "/../models/OrderModel.php";
class OrderController
{

    function getOrderDetail($orderId)
    {

        $orderModel = new OrderModel();
        $order = $orderModel->getUserOrders(null, $orderId);
        echo '<br/>';
        echo '<br/>';

        if ($order) {
            $order = $order[$orderId];
            // echo '<pre>';
            // var_dump($order);
            // echo '</pre>';
            $orderInfo = [
                'order_id' => $orderId,
                'address' => $order['shipping_address'],
                'total' => $order['total_amount'],
                'order_date' => $order['order_date'],
                'status' => $order['status'],
                'customer_name' => $order['customer_name'],
                'user_id' => $order['user_id'],
                'items' => $order['items'],
                'customer_email' => $order['customer_email']
            ];
            include __DIR__ . '/../../Orderdetail/adminOrderDetail.php';

        }

    }
    function comfirmOrder($orderId)
    {
        $orderModel = new OrderModel();
        $orderComfirmedId = $orderModel->comfirmOrder($orderId);
        $this->getOrderDetail($orderComfirmedId);

    }
    function showOrderDetail($orderId)
    {
        $orderModel = new OrderModel();
        $order = $orderModel->getUserOrders(null, $orderId);
        echo '<br/>';
        echo '<br/>';

        if ($order) {
            $order = $order[$orderId];
            // echo '<pre>';
            // var_dump($order);
            // echo '</pre>';
            $orderInfo = [
                'order_id' => $orderId,
                'address' => $order['shipping_address'],
                'total' => $order['total_amount'],
                'order_date' => $order['order_date'],
                'status' => $order['status'],
                'customer_name' => $order['customer_name'],
                'user_id' => $order['user_id'],
                'items' => $order['items']
            ];
            include __DIR__ . '/../../Orderdetail/orderdetail.php';
        }
    }

}
