<?php
include_once 'db.php'; // conexión con $pdo

// Obtener categorías desde la DB
$stmt = $pdo->prepare("SELECT id, nombre FROM categorias ORDER BY id ASC LIMIT 3");
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener todas las categorías para el dropdown
$stmt2 = $pdo->prepare("SELECT id, nombre FROM categorias ORDER BY nombre ASC");
$stmt2->execute();
$todasLasCategorias = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Header principal -->
<head><!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
  <a class="navbar-brand" href="#">
    <img src="img/logo.png" alt="Logo" width="40" height="40">
  </a>

  <form class="d-flex mx-auto" style="max-width: 500px; width: 100%;">
    <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Buscar">
    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
  </form>

  <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex flex-row align-items-center">
    <li class="nav-item mx-3">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> Mi cuenta</a>
    </li>
    <li class="nav-item">
      <a class="nav-link position-relative" href="#">
        <i class="fas fa-shopping-cart fa-lg"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          0
        </span>
      </a>
    </li>
  </ul>
</nav>

<!-- Sub barra con categorías -->
<nav class="navbar navbar-expand-lg px-3" style="background-color: #7d7a65;">

  <div class="container-fluid">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row align-items-center">
      <!-- Dropdown Categorías -->
      <li class="nav-item dropdown me-3" id="dropdown-categorias">
  <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownCategorias" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Categorías
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownCategorias" id="menu-categorias">
    <?php foreach ($todasLasCategorias as $cat): ?>
      <li><a class="dropdown-item" href="productos.php?categoria=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nombre']) ?></a></li>
    <?php endforeach; ?>
  </ul>
</li>


      <!-- 3 primeras categorías como accesos rápidos -->
      <?php foreach ($categorias as $cat): ?>
        <li class="nav-item me-3">
          <a class="nav-link text-white" href="productos.php?categoria=<?= $cat['id'] ?>"><?= htmlspecialchars($cat['nombre']) ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>

<!-- Bootstrap JS (requerido para dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
