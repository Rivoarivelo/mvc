<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier le profil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f0f2f5; font-family: 'Arial', sans-serif; }

.card {
  border-radius: 20px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

/* Conteneur avatar */
.avatar-container {
  position: relative;
  display: inline-block;
  margin-bottom: 20px;
}

/* Avatar avec bordure animée */
.avatar {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  border: 5px solid transparent;
  background-image: linear-gradient(white, white), 
                    linear-gradient(45deg, #ff2d55, #0d6efd, #ff9800);
  background-origin: border-box;
  background-clip: content-box, border-box;
  animation: pulse 3s infinite;
}

/* Animation pulsante TikTok style */
@keyframes pulse {
  0% { box-shadow: 0 0 0 0 rgba(255,45,85, 0.7); }
  70% { box-shadow: 0 0 0 20px rgba(255,45,85, 0); }
  100% { box-shadow: 0 0 0 0 rgba(255,45,85, 0); }
}

/* Badge édition */
.edit-badge {
  position: absolute;
  bottom: 0;
  right: 0;
  background: #0d6efd;
  color: #fff;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border: 3px solid #fff;
  font-weight: bold;
  font-size: 18px;
  transition: background 0.3s ease;
}

.edit-badge:hover {
  background: #ff2d55;
}
</style>
</head>
<body>
<div class="container py-5">
  <div class="card p-4 mx-auto" style="max-width: 600px;">
    <h2 class="text-center mb-4">Modifier le profil</h2>
    <form method="post" action="/user/update/<?= $user['id'] ?>" enctype="multipart/form-data">
      
      <!-- Avatar avec design TikTok -->
      <div class="avatar-container text-center">
        <img id="avatarPreview" src="/uploads/<?= $user['avatar'] ?>" alt="avatar" class="avatar">
        <label class="edit-badge" title="Changer l'avatar">
          <input type="file" name="avatar" style="display:none;" accept="image/*" onchange="previewImage(event)">
          ✎
        </label>
      </div>

      <div class="mb-3">
        <label class="form-label">Nom d'utilisateur</label>
        <input type="text" name="username" class="form-control" value="<?= esc($user['username']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" class="form-control" rows="3"><?= esc($user['bio']) ?></textarea>
      </div>
      <button type="submit" class="btn btn-success w-100">Enregistrer les modifications</button>
    </form>
  </div>
</div>

<!-- Script pour aperçu instantané -->
<script>
function previewImage(event) {
  const reader = new FileReader();
  reader.onload = function(){
    document.getElementById('avatarPreview').src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>
