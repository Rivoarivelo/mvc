<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Profil utilisateur</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background:#f8f9fa; font-family: Arial, sans-serif; }
.cover-container {
    position: relative;
    width: 100%;
    height: 250px;
    background: #ddd url('/uploads/<?= $user['cover_image'] ?? "default_cover.jpg" ?>') center/cover no-repeat;
    border-radius: 0 0 30px 30px;
}
.change-cover-btn {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0,0,0,0.5);
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 20px;
    cursor: pointer;
}
.avatar {
    width: 140px; height: 140px;
    border-radius: 50%; object-fit: cover;
    border: 5px solid #fff;
    margin-top: -70px;
    background: #fff;
}
.username { font-size: 1.8rem; font-weight: bold; margin-top: 10px; }
.bio { color: #6c757d; margin-bottom: 20px; }
</style>
</head>
<body>

<!-- Couverture -->
<div class="cover-container">
    <!-- Bouton changer couverture -->
    <button class="change-cover-btn" onclick="document.getElementById('coverInput').click();">
        Changer couverture
    </button>

    <!-- Formulaire upload invisible -->
    <form id="coverForm" method="post" action="/user/update_cover/<?= $user['id'] ?>" enctype="multipart/form-data">
        <input type="file" id="coverInput" name="cover_image" accept="image/*" style="display:none" onchange="document.getElementById('coverForm').submit();">
    </form>
</div>

<div class="container text-center">
    <!-- Avatar -->
    <img src="/uploads/<?= $user['avatar'] ?>" class="avatar">
    <h2 class="username"><?= esc($user['username']) ?></h2>
    <p class="bio"><?= esc($user['bio'] ?? 'Pas encore de bio.') ?></p>

    <!-- Actions -->
    <a href="/user/edit/<?= $user['id'] ?>" class="btn btn-outline-primary">Modifier Profil</a>
    <a href="/user/delete/<?= $user['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Supprimer ce profil ?');">Supprimer Profil</a>
    <a href="/users" class="btn btn-outline-success">Voir tous les profils</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
