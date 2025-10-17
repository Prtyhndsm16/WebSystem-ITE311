<?php helper('text'); ?>

<?= $this->include('templates/header') ?>

<div class="container mt-4">
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger"><?= esc($error) ?></div>
    <?php endif; ?>

    <h2>Announcements</h2>

    <?php if(empty($announcements)): ?>
        <p>No announcements yet.</p>
    <?php else: ?>
        <div class="list-group">
            <?php foreach($announcements as $ann): ?>
                <div class="list-group-item mb-2">
                    <h5 class="mb-1"><?= esc($ann['title']) ?></h5>
                    <small class="text-muted"><?= date('F j, Y, g:i A', strtotime($ann['created_at'])) ?></small>
                    <p class="mb-1 mt-2"><?= nl2br(esc($ann['content'])) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->include('templates/footer') ?>
