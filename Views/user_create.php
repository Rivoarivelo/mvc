<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Créer un utilisateur</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f0f2f5; font-family: 'Arial', sans-serif; }
.card { border-radius: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
.btn-custom { border-radius: 50px; font-weight: bold; }
h2 { font-weight: bold; color: #0d6efd; }
</style>
</head>
<body>
<div class="container py-5">
  <div class="card p-4 mx-auto" style="max-width: 600px;">
    <h2 class="text-center mb-4">Créer un profil</h2>
    <form method="post" action="/user/store" enctype="multipart/form-data">
      <div class="mb-3 text-center">
        <input type="file" name="avatar" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Nom d'utilisateur</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" class="form-control" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-100 btn-custom">Créer le profil</button>
    </form>

    <div class="text-center mt-3">
      <a href="/users" class="btn btn-outline-success btn-custom">Voir tous les profils</a>
    </div>
  </div>
</div>
</body>
</html>
