
<link rel="stylesheet" href="/public/css/cards.css">

<div class="product-card">
    <div class="product-image">
        <img src="<?= $product['imageUrl']; ?>" alt="<?= $product['name']; ?>">
    </div>
    <div class="product-details">
        <h3 class="product-name"><?= $product['name']; ?></h3>
        <p class="product-description"><?= $product['description']; ?></p>
        <p class="product-price">$<?= number_format($product['price'], 2); ?></p>
        <p class="product-stock"><?= $product['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?></p>
    </div>
    <div class="product-actions">
        <button class="btn btn-primary" onclick="addToCart(<?= $product['id']; ?>)">Add to Cart</button>
        <button class="btn btn-secondary" onclick="viewProduct(<?= $product['id']; ?>)">View Details</button>
    </div>
</div>
