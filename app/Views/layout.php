<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $title ?? 'ITE311-SATURGO' ?></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="<?= site_url('/') ?>">ITE311-SATURGO</a>
      
      <!-- Navbar links -->
      <div class="ms-auto d-flex">
        <a href="<?= site_url('/') ?>" class="nav-link text-white me-3">Home</a>
        <a href="<?= site_url('about') ?>" class="nav-link text-white me-3">About</a>
        <a href="<?= site_url('contact') ?>" class="nav-link text-white">Contact</a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mt-5">
    <?= $this->renderSection('content') ?>
  </div>

  <!-- Footer -->
  <footer class="text-center mt-5 p-3 bg-dark text-white">
    <p>&copy; <?= date('Y') ?> ITE311-SATURGO. All Rights Reserved.</p>
  </footer>

</body>
</html>
