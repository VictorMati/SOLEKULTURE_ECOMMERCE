<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SoleKulture</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Update with actual path -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="main-wrapper">
        <!-- Sidebar -->
        <div class="main-sidebar">
            <?php include 'sidebar.php'; ?>
        </div>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Header -->
            <div class="main-header">
                <?php include 'header.php'; ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Showcase Section -->
                <section class="showcase">
                    <div class="showcase-container">
                        <?php foreach ($showcases as $showcase): ?>
                            <div class='showcase-item'>
                                <img src='<?= $showcase["imageUrl"] ?>' alt='<?= $showcase["title"] ?>'>
                                <div class='showcase-details'>
                                    <h2><?= $showcase["title"] ?></h2>
                                    <p><?= $showcase["content"] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <!-- Featured Products Section -->
                <section class="featured-products">
                    <h2>Featured Products</h2>
                    <div class="products-container">
                        <?php foreach ($featuredProducts as $prod): ?>
                            <div class='product-card'>
                                <img src='<?= $prod["imageUrl"] ?>' alt='<?= $prod["name"] ?>'>
                                <div class='product-details'>
                                    <h3><?= $prod["name"] ?></h3>
                                    <p>$<?= $prod["price"] ?></p>
                                    <a href='product.php?id=<?= $prod["id"] ?>' class='btn'>View Details</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <!-- Categories Section -->
                <section class="categories">
                    <h2>Shop by Categories</h2>
                    <div class="categories-container">
                        <?php foreach ($categories as $cat): ?>
                            <div class='category-card'>
                                <div class='category-details'>
                                    <h3><?= $cat["name"] ?></h3>
                                    <p><?= $cat["description"] ?></p>
                                    <a href='category.php?id=<?= $cat["id"] ?>' class='btn'>Shop Now</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>

            <!-- Footer -->
            <div class="main-footer">
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </div>

    <script src="path/to/your/js/scripts.js"></script> <!-- Update with actual path -->
</body>
</html>
