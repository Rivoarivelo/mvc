<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Minimarket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Boutons moins dominants */
    .btn-small {
      padding: 0.25rem 0.5rem;
      font-size: 0.85rem;
    }
    /* Image produit cliquable */
    .produit-image {
      cursor: pointer;
      transition: transform 0.2s;
    }
    .produit-image:hover {
      transform: scale(1.05);
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-5">

    <!-- Flash message -->
    <?php if(session()->getFlashdata('message')): ?>
        <div class="alert alert-info">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif; ?>

    <h2 class="text-center mb-4">Ajouter un article</h2>

    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#ajouterArticleModal">
        Ajouter un article
    </button>

    <!-- Modal Ajouter Article -->
<div class="modal fade" id="ajouterArticleModal" tabindex="-1" aria-labelledby="ajouterArticleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('articles/add') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="ajouterArticleModalLabel">Ajouter un article</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Prix (€)</label>
            <input type="number" step="0.01" name="prix" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Valeur pour échange (€)</label>
            <input type="number" step="0.01" name="valeur" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-small">Ajouter</button>
          <button type="button" class="btn btn-secondary btn-small" data-bs-dismiss="modal">Fermer</button>
        </div>
      </form>
    </div>
  </div>
</div>


    <h3>Articles disponibles</h3>
    <div class="row g-4">
        <?php if(isset($articles) && !empty($articles)): ?>
            <?php foreach($articles as $article): ?>
                <div class="col-md-4">
                    <div class="card shadow h-100">
                        <img src="<?= base_url('uploads/'.$article['photo']) ?>" 
                             class="card-img-top produit-image" 
                             style="height:225px; object-fit:cover;" 
                             alt="<?= esc($article['nom']) ?>"
                             onclick="openModal('<?= base_url('uploads/'.$article['photo']) ?>')">

                        <div class="card-body">
                            <h5 class="card-title"><?= esc($article['nom']) ?></h5>
                            <p class="card-text"><?= esc($article['description']) ?></p>
                            <p class="text-primary fw-bold"><?= esc($article['prix']) ?> €</p>
                            <p class="text-muted">Valeur échange: <?= esc($article['valeur']) ?> €</p>
                            <div class="d-flex flex-wrap gap-2">
                                <?php if($article['status'] === 'disponible'): ?>
                                    <a href="<?= base_url('articles/acheter/'.$article['id']) ?>" class="btn btn-warning btn-small">Acheter</a>
                                    <button class="btn btn-success btn-small" data-bs-toggle="modal" data-bs-target="#echangerModal<?= $article['id'] ?>">Échanger</button>
                                <?php else: ?>
                                    <span class="badge bg-secondary"><?= ucfirst($article['status']) ?></span>
                                <?php endif; ?>
                                <a href="<?= base_url('articles/delete/'.$article['id']) ?>" class="btn btn-danger btn-small">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>

                                <!-- Modal échange -->
                <div class="modal fade" id="echangerModal<?= $article['id'] ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="<?= base_url('articles/echanger/'.$article['id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h5 class="modal-title">Échanger <?= esc($article['nom']) ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <div class="mb-3">
                            <label>Nom de votre objet</label>
                            <input type="text" name="nom_objet" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description_objet" class="form-control" rows="3" required></textarea>
                          </div>
                          <div class="mb-3">
                            <label>Valeur (€)</label>
                            <input type="number" step="0.01" name="valeur_objet" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label>Photo</label>
                            <input type="file" name="photo_objet" class="form-control" accept="image/*" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success btn-small">Proposer l'échange</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun article disponible.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal image plein écran -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen d-flex align-items-center justify-content-center">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body p-0 d-flex align-items-center justify-content-center">
        <img src="" id="modalImage" class="img-fluid" style="max-height:100vh; max-width:100vw; object-fit:contain;" alt="Image du produit">
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary btn-small" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- JS Bootstrap et fonction modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function openModal(imageSrc) {
    var modalImage = document.getElementById('modalImage');
    modalImage.src = imageSrc;

    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
  }
</script>

</body>
</html>
