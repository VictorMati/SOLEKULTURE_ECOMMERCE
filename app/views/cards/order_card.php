
<link rel="stylesheet" href="/public/css/cards.css">
<div class="order-card">
    <div class="order-header">
        <h3 class="order-id">Order #<?= $order['id']; ?></h3>
        <p class="order-date"><?= date('F j, Y, g:i a', strtotime($order['createdDate'])); ?></p>
    </div>
    <div class="order-details">
        <p class="order-total">Total Amount: $<?= number_format($order['totalAmount'], 2); ?></p>
        <p class="order-status">Status: <?= ucfirst($order['status']); ?></p>
        <p class="order-shipping">Shipping Address: <?= $order['shippingAddress']; ?></p>
    </div>
    <div class="order-actions">
        <button class="btn btn-primary" onclick="viewOrder(<?= $order['id']; ?>)">View Details</button>
        <?php if ($order['status'] !== 'cancelled'): ?>
            <button class="btn btn-secondary" onclick="cancelOrder(<?= $order['id']; ?>)">Cancel Order</button>
        <?php endif; ?>
    </div>
</div>
