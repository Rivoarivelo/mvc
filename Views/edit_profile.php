<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier Profil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background: #f8f9fa; font-family: Arial, sans-serif; }
.card { border-radius: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
.avatar { width: 120px; height:120px; border-radius:50%; object-fit:cover; border:5px solid #fff; transition:0.3s; }
.avatar:hover { transform: scale(1.1); box-shadow:0 8px 20px rgba(0,0,0,0.3);}
.cover-preview { width:100%; height:200px; object-fit:cover; border-radius:15px; margin-bottom:15px; }
</style>
</head>
<body>
<div class="container py-5">
    <div class="card p-4 mx-auto" style="max-width:600px;">
        <h2 class="text-center mb-4">Modifier le profil</h2>
        <form method="post" action="/user/update/<?= $user['id'] ?>" enctype="multipart/form-data">

            <label>Avatar :</label>
            <input type="file" name="avatar" accept="image/*" onchange="previewAvatar(event)" class="form-control mb-3">
            <img id="avatarPreview" src="/uploads/<?= $user['avatar'] ?>" class="avatar mb-3">

            <label>Image de fond :</label>
            <input type="file" name="cover_image" accept="image/*" onchange="previewCover(event)" class="form-control mb-3">
            <img id="coverPreview" src="/uploads/<?= $user['cover_image'] ?? 'default_cover.jpg' ?>" class="cover-preview">

            <label>Nom d'utilisateur :</label>
            <input type="text" name="username" class="form-control mb-3" value="<?= esc($user['username']) ?>" required>

            <label>Email :</label>
            <input type="email" name="email" class="form-control mb-3" value="<?= esc($user['email']) ?>" required>

            <label>Bio :</label>
            <textarea name="bio" class="form-control mb-3"><?= esc($user['bio']) ?></textarea>

            <button type="submit" class="btn btn-success w-100">Enregistrer</button>
        </form>
    </div>
</div>

<script>
function previewAvatar(event){
    const reader = new FileReader();
    reader.onload = () => { document.getElementById('avatarPreview').src = reader.result; }
    reader.readAsDataURL(event.target.files[0]);
}
function previewCover(event){
    const reader = new FileReader();
    reader.onload = () => { document.getElementById('coverPreview').src = reader.result; }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
</body>
</html>
