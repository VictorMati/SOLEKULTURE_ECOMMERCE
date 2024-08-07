<div class="card product-card">
    <img src="<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>">
    <h2><?= $product['name'] ?></h2>
    <p><?= $product['price'] ?></p>
    <a href="/product/<?= $product['id'] ?>">View Details</a>
</div>
