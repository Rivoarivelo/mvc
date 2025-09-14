<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Liste des utilisateurs</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f0f2f5; font-family: 'Arial', sans-serif; }
.user-card {
  border-radius: 15px; background: #fff;
  padding: 20px; box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  transition: transform 0.2s;
}
.user-card:hover { transform: translateY(-5px); }
.avatar { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #0d6efd; }
.btn-custom { border-radius: 50px; font-weight: bold; }
</style>
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4 text-center">Liste des utilisateurs</h2>
  <div class="row g-4">
    <?php if(!empty($users)): ?>
      <?php foreach($users as $user): ?>
        <div class="col-md-4">
          <div class="user-card text-center">
            <img src="/uploads/<?= $user['avatar'] ?>" class="avatar mb-2" alt="avatar">
            <h5><?= esc($user['username']) ?></h5>
            <p class="text-muted"><?= esc($user['email']) ?></p>
            <a href="/user/profile/<?= $user['id'] ?>" class="btn btn-sm btn-primary btn-custom mb-1">Voir Profil</a>
            <a href="/user/edit/<?= $user['id'] ?>" class="btn btn-sm btn-warning btn-custom mb-1">Modifier</a>
            <a href="/user/delete/<?= $user['id'] ?>" class="btn btn-sm btn-danger btn-custom mb-1" onclick="return confirm('Voulez-vous vraiment supprimer ce profil ?');">Supprimer</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-center">Aucun utilisateur trouvé.</p>
    <?php endif; ?>
  </div>
  <div class="text-center mt-4">
    <a href="/user/create" class="btn btn-success btn-custom">Ajouter un nouvel utilisateur</a>
  </div>
</div>
</body>
</html>
