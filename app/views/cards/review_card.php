

<link rel="stylesheet" href="/public/css/cards.css">

<div class="review-card">
    <div class="review-header">
        <h3 class="review-user"><?= $review['username']; ?></h3>
        <p class="review-date"><?= date('F j, Y, g:i a', strtotime($review['createdDate'])); ?></p>
    </div>
    <div class="review-rating">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <span class="star <?= $i < $review['rating'] ? 'filled' : ''; ?>">&#9733;</span>
        <?php endfor; ?>
    </div>
    <div class="review-comment">
        <p><?= $review['comment']; ?></p>
    </div>
    <div class="review-actions">
        <?php if ($isAdmin): ?>
            <button class="btn btn-secondary" onclick="deleteReview(<?= $review['id']; ?>)">Delete Review</button>
        <?php endif; ?>
    </div>
</div>
