<!-- ../views/order/history.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
</head>
<body>
    <h1>Order History</h1>

    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Shipping Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_date']); ?></td>
                        <td><?php echo htmlspecialchars($order['shipping_address']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
</body>
</html>
