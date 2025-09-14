<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Minimarket - Ajout & Affichage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="text-center mb-4">Minimarket - Ajouter un article</h2>

    <!-- Formulaire d'ajout -->
    <div class="card shadow p-4 mb-5">
      <h3 class="mb-3">Ajouter un article</h3>
      <form id="formArticle">
        <div class="mb-3">
          <label class="form-label">Nom de l'article</label>
          <input type="text" class="form-control" id="nom" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Prix (€)</label>
          <input type="number" class="form-control" id="prix" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea class="form-control" id="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Photo de l'article</label>
          <input type="file" class="form-control" id="photo" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>

    <!-- Interface principale : liste des articles -->
    <h3 class="mb-3">Articles disponibles</h3>
    <div id="listeArticles" class="row g-4"></div>
  </div>

  <script>
    const form = document.getElementById("formArticle");
    const listeArticles = document.getElementById("listeArticles");

    // Charger les articles depuis le localStorage
    let articles = JSON.parse(localStorage.getItem("articles")) || [];

    // Fonction pour afficher un article
    function afficherArticle(article, index) {
      const articleCard = document.createElement("div");
      articleCard.classList.add("col-md-4");

      articleCard.innerHTML = `
        <div class="card shadow h-100">
          <img src="${article.photo}" class="card-img-top" alt="${article.nom}" style="height:225px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title">${article.nom}</h5>
            <p class="card-text">${article.description}</p>
            <p class="text-primary fw-bold">${article.prix} €</p>
            <div class="d-flex flex-wrap gap-2">
              <button class="btn btn-danger">Supprimer</button>
              <button class="btn btn-warning">Acheter</button>
              <button class="btn btn-success">Échanger</button>
            </div>
          </div>
        </div>
      `;

      // Bouton supprimer
      articleCard.querySelector(".btn-danger").addEventListener("click", () => {
        articles.splice(index, 1);
        localStorage.setItem("articles", JSON.stringify(articles));
        afficherArticles();
      });

      listeArticles.appendChild(articleCard);
    }

    // Fonction pour afficher tous les articles
    function afficherArticles() {
      listeArticles.innerHTML = "";
      articles.forEach((article, index) => afficherArticle(article, index));
    }

    // Ajout d’un nouvel article
    form.addEventListener("submit", function(e) {
      e.preventDefault();

      const nom = document.getElementById("nom").value;
      const prix = document.getElementById("prix").value;
      const description = document.getElementById("description").value;
      const photo = document.getElementById("photo").files[0];

      const reader = new FileReader();
      reader.onload = function(e) {
        const article = {
          nom,
          prix,
          description,
          photo: e.target.result // sauvegarde l’image en base64
        };

        articles.push(article);
        localStorage.setItem("articles", JSON.stringify(articles));

        afficherArticles();
        form.reset();
      };
      reader.readAsDataURL(photo);
    });

    // Charger les articles au démarrage
    afficherArticles();
  </script>
</body>
</html>
