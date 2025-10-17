<!-- app/Views/announcements.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Latest Announcements</h1>
        <?php if (!empty($announcements)): ?>
            <ul class="list-group">
                <?php foreach ($announcements as $announcement): ?>
                    <li class="list-group-item">
                        <h5><?php echo esc($announcement['title']); ?></h5>
                        <p><?php echo esc($announcement['content']); ?></p>
                        <small>Posted on: <?php echo esc($announcement['created_at']); ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No announcements available.</p>
        <?php endif; ?>
    </div>
</body>
</html>