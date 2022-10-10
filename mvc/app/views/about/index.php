<body class="container bg-dark">

  <div class="bg-light p-5 rounded mt-3">
    <h1>About Me</h1>
    <img src="<?= BASEURL; ?>/img/profile.jpeg" alt="Hady Ismanto" width="200" class="rounded-circle shadow">
    <p class="lead">Halo, nama saya <?= $data['nama']; ?> , umur saya <?= $data['umur']; ?> tahun, saya adalah seorang <?= $data['pekerjaan']; ?></p>
    <a class="btn btn-lg btn-primary" href="/docs/5.2/components/navbar/" role="button">View navbar docs &raquo;</a>
  </div>
</body>