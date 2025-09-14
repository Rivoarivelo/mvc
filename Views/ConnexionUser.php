<?php
session_start();
// Simulation utilisateur connecté
$_SESSION['user'] = "Jean Dupont"; 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>MiniMarket - Utilisateur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body.dark-mode { background-color: #121212; color: #f1f1f1; }
    .navbar { border-bottom: 1px solid #ccc; }
  </style>
</head>
<body>
  <!-- Barre de navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <a class="navbar-brand fw-bold" href="#">MiniMarket</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="#">Catégories</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Favoris</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Historique</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Espace Troc</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Discussions</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Déposer un article</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <span class="me-3 fw-bold">👤 <?php echo $_SESSION['user']; ?></span>
        <button class="btn btn-outline-dark me-2" id="toggleDark">🌙</button>
        <a href="visite.php" class="btn btn-danger">Déconnexion</a>
      </div>
    </div>
  </nav>

  <!-- Contenu -->
  <div class="container py-5">
    <h2 class="mb-4">Bienvenue, <?php echo $_SESSION['user']; ?> !</h2>

    <div class="row g-4">
      <!-- Profil -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Mon Profil</h5>
            <p>Email: exemple@mail.com</p>
            <p>Membre depuis: 2024</p>
          </div>
        </div>
      </div>

      <!-- Historique -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Historique</h5>
            <p>Dernier achat: Produit A</p>
            <p>Dernier troc: Produit B</p>
          </div>
        </div>
      </div>

      <!-- Déposer un article -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Déposer un Article</h5>
            <form>
              <input type="text" class="form-control mb-2" placeholder="Nom de l'article">
              <input type="number" class="form-control mb-2" placeholder="Prix">
              <textarea class="form-control mb-2" placeholder="Description"></textarea>
              <button class="btn btn-success w-100">Publier</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    document.getElementById('toggleDark').addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
    });
  </script>
</body>
</html>
