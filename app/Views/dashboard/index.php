<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-3">Welcome, <?= esc($name) ?>!</h1>
    <p>Your role is: <strong><?= esc($role) ?></strong></p>

    <a href="<?= site_url('/logout') ?>" class="btn btn-danger">Logout</a>
</body>
</html>
