<!-- ../views/product/show.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="/public/css/cards.css"> <!-- Link to card styles -->
    <link rel="stylesheet" href="/public/css/styles.css"> <!-- Additional styles -->
</head>
<body>
    <?php include '../views/includes/header.php'; ?> <!-- Reusable header -->

    <main class="container">
        <!-- Product Details Card -->
        <div class="product-card">
            <div class="product-image">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div class="product-details">
                <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                <p class="product-price">$<?php echo htmlspecialchars(number_format($product['price'], 2)); ?></p>
                <p class="product-stock"><?php echo $product['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?></p>
            </div>
            <div class="product-actions">
                <form action="/cart/add" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                    <input type="number" name="quantity" value="1" min="1" required>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
                <a href="/product/<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-secondary">View Details</a>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews-section">
            <h2>Reviews</h2>
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review-card">
                        <div class="review-header">
                            <h3 class="review-user"><?php echo htmlspecialchars($review['username']); ?></h3>
                            <p class="review-date"><?php echo date('F j, Y, g:i a', strtotime($review['createdDate'])); ?></p>
                        </div>
                        <div class="review-rating">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <span class="star <?= $i < $review['rating'] ? 'filled' : ''; ?>">&#9733;</span>
                            <?php endfor; ?>
                        </div>
                        <div class="review-comment">
                            <p><?php echo htmlspecialchars($review['comment']); ?></p>
                        </div>
                        <div class="review-actions">
                            <?php if ($isAdmin): ?>
                                <button class="btn btn-secondary" onclick="deleteReview(<?php echo $review['id']; ?>)">Delete Review</button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No reviews yet.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include '../views/includes/footer.php'; ?> <!-- Reusable footer -->
</body>
</html>
