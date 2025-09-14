<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil utilisateur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .profile-card {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      border-radius: 20px;
      background: #fff;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .avatar {
      width: 120px; height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #0d6efd;
    }
    .username { font-size: 1.8rem; font-weight: bold; }
    .bio { color: #6c757d; font-style: italic; }
  </style>
</head>
<body>
  <div class="profile-card text-center">
    <img src="/uploads/<?= $user['avatar'] ?>" alt="avatar" class="avatar mb-3">
    <h2 class="username"><?= $user['username'] ?></h2>
    <p class="bio"><?= $user['bio'] ?? "Pas encore de bio." ?></p>
    <hr>
    <p><strong>Email :</strong> <?= $user['email'] ?></p>
    <button class="btn btn-primary">Modifier Profil</button>
  </div>
</body>
</html>
