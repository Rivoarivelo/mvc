<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Shop — Template</title>
  <!-- Bootstrap 5 CDN -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
   <link  rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
  <style>
    /* Custom styles to match the provided template look */
    body { background:#f3f4f6; color:#111827; }
    .hero {
      height: 260px;
      background: url('https://images.unsplash.com/photo-1505691723518-36a0b89a2d5b?auto=format&fit=crop&w=1600&q=60') center/cover no-repeat;
      position: relative;
      display:flex; align-items:center;
      margin-bottom: 30px;
    }
    .hero .overlay{ background: rgba(255,255,255,0.85); padding:18px 20px; border-radius:10px; margin-left:40px; }
    .hero h1 { font-size:8rem; font-weight:700; color:rgba(255,255,255,0.92); margin:0; position:absolute; left:30px; top:10px; z-index:1; opacity:0.95; }
    .search-inline { max-width:640px; }
    .sidebar .list-group-item { border:none; padding-left:0; }
    .card-product { border-radius:12px; box-shadow:0 6px 18px rgba(15,23,42,0.06); }
    .badge-round { border-radius:999px; background:#eef2ff; color:#3730a3; padding:4px 8px; font-size:12px; }
    .card-price { font-weight:700; }
    .btn-pill { border-radius:50px; }
    .product-grid .card { border:none; }
    .section-subscribe { background:#111827; color:#fff; border-radius:12px; padding:36px; }
    footer { font-size:14px; color:#6b7280; }
    .small-muted { color:#6b7280; font-size:13px; }
  </style>
</head>
<body>
  <!-- Header -->
  <nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container d-flex justify-content-around">
      <a class="navbar-brand fw-bold" href="#">Stuffsus</a>
      <div class="d-flex align-items-center gap-5" id="navMain">
        <form class="ms-auto d-flex search-inline" role="search">
            <input class="form-control me-2" type="search" placeholder="Search on Stuffsus" aria-label="Search">
            <button class="btn btn-dark btn-sm">Search</button>
        </form>
        <div class="d-flex align-items-center">
          <a class="me-3 small-muted" href="#">Search</a>
          <a class="me-3 small-muted" href="#">Cart</a>
          <!--<a class="small-muted" href="#">Profile</a>-->
          <a href="<?= site_url('Tsikaa/login') ?>">Se connecter</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Bootstrap 5 Carousel -->
<div id="wordCarousel" style="height:320px" class="carousel slide mt-3" data-bs-ride="carousel" data-bs-interval="1500">
  <div class="carousel-inner text-center">
    <div class="carousel-item active ">
        <img src="shoes.png" style="width:300px;" class="display-4"/>
    </div>
    <div class="carousel-item">
        <img src="headsound.png" style="width:300px;" class="display-4"/>
    </div>
    <div class="carousel-item">
        <img src="tshirt.png" style="width:300px;" class="display-4"/>
    </div>
  </div>

  <!-- Contrôles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#wordCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="visually-hidden">Précédent</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#wordCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="visually-hidden">Suivant</span>
  </button>
</div>


  <!-- Hero -->
  <section class="position-relative d-flex gap-4 align-items-center">
    <h1 style="top:-200px; left:20%;font-size:4em" class=" text-secondary opacity-75 position-absolute display-1 fw-bold text-shadow justify-content-between">Shop</h1>
    <h1 style="top:-260px; left:68%;font-size:4em" class=" text-secondary opacity-75 position-absolute display-1 fw-bold text-shadow justify-content-between">Center</h1>
    <div class="d-flex justify-content-between align-items-center w-100 px-5 mt-5">
    <h5 class="mb-1">Give All You Need</h5>
    </div>
  </section>

  <main class="container">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-lg-3 mb-4 sidebar">
        <div class="card p-3 mb-4">
          <h6 class="mb-3">Category</h6>
          <div class="list-group list-group-flush">
            <a href="#" class="list-group-item">All Product <span class="badge bg-danger ms-2">32</span></a>
            <a href="#" class="list-group-item">For Home</a>
            <a href="#" class="list-group-item">For Music</a>
            <a href="#" class="list-group-item">For Phone</a>
            <a href="#" class="list-group-item">For Storage</a>
          </div>
        </div>

        <div class="card p-3 mb-4">
          <h6 class="mb-2">Filters</h6>
          <div class="small-muted">New Arrival</div>
          <div class="small-muted">Best Seller</div>
          <div class="small-muted">On Discount</div>
        </div>
      </aside>

      <!-- Product grid -->
      <section class="col-lg-9">
        <div class="row mb-3">
          <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Products</h4>
            <div class="small-muted">Showing 1-9 of 200</div>
          </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 product-grid">
          <!-- Product Card (repeat) -->
          <?php for($i=0;$i<9;$i++): ?>
          <div class="col">
            <div class="card card-product h-100 p-3">
              <div class="position-relative">
                <img src="https://via.placeholder.com/400x280" class="card-img-top rounded-3" alt="product">
                <span class="badge badge-round position-absolute top-0 end-0 m-3">Other</span>
              </div>
              <div class="card-body p-2">
                <h6 class="card-title mb-1">Product Name</h6>
                <div class="small-muted mb-2">⭐ 5.0 (1.2k Reviews)</div>
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="card-price">$29.90</div>
                  </div>
                  <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm btn-pill">Add to Chart</button>
                    <button class="btn btn-dark btn-sm btn-pill">Buy Now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endfor; ?>
        </div>

        <!-- Pagination -->
        <nav class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link">Previous</a></li>
            <li class="page-item active"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link">2</a></li>
            <li class="page-item"><a class="page-link">3</a></li>
            <li class="page-item"><a class="page-link">Next</a></li>
          </ul>
        </nav>

        <!-- Recommendations carousel (simple horizontal scroll) -->
        <section class="mt-5">
          <h5>Explore our recommendations</h5>
          <div class="d-flex gap-3 overflow-auto py-3">
            <?php for($j=0;$j<6;$j++): ?>
            <div style="min-width:220px;">
              <div class="card p-3 card-product">
                <img src="https://via.placeholder.com/220x140" class="card-img-top rounded-3" alt="rec">
                <div class="card-body p-2">
                  <h6 class="mb-1">Rec Product</h6>
                  <div class="small-muted mb-2">⭐ 5.0 (1.2k Reviews)</div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="card-price">$12.00</div>
                    <button class="btn btn-outline-secondary btn-sm btn-pill">Add to Chart</button>
                  </div>
                </div>
              </div>
            </div>
            <?php endfor; ?>
          </div>
        </section>

        <!-- Subscribe CTA -->
        <section class="mt-5">
          <div class="section-subscribe d-flex justify-content-between align-items-center">
            <div>
              <h4>Ready to Get Our New Stuff?</h4>
              <p class="small-muted mb-0">Subscribe for updates, deals and new arrivals.</p>
            </div>
            <form class="d-flex" style="max-width:420px;">
              <input class="form-control me-2" placeholder="Your Email" aria-label="Email">
              <button class="btn btn-light">Send</button>
            </form>
          </div>
        </section>

      </section>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
      <div class="row py-4">
        <div class="col-md-8">
          <h6>About</h6>
          <p class="small-muted">Stuffsus for Homes and Needs. We provide curated products and reliable service.</p>
        </div>
        <div class="col-md-4 text-md-end">
          <div class="small-muted">© 2025 Stuffsus. All rights reserved.</div>
        </div>
      </div>
    </footer>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
