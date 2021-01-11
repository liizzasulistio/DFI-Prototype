<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet"> 
    <title> <?= $title; ?> </title>
  </head>
  <body>
<?= $this->include('layout/navbar'); ?>
<?= $this->renderSection('content'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script>
  function avatar()
  {
    const avatar = document.querySelector('.form-control');
    const avaPreview = document.querySelector('.ava-preview');
    const fileAva = new FileReader();
    fileAva.readAsDataURL(avatar.files[0]);
    fileAva.onload = function(e)
    {
      avaPreview.src = e.target.result;
    }
  }
</script>

<!-- Footer -->
<footer class="text-muted py-5">
    <div class="container">
    <h4>Contact Us</h4>
        <p class="mb-1">
           <img src="<?=base_url('icons/twitter.png')?>" class="soc-med"> @dfi_official
        </p>
        <p class="mb-1">
            <img src="<?=base_url('icons/instagram.png')?>" class="soc-med"> @day6fanartistsid
        </p>
        <p class="mb-1">
            <img src="<?=base_url('icons/youtube.png')?>" class="soc-med"> Day6 Fanartists ID
        </p>
        <div>Icons made by <a href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
    </div>
</footer>
</body>
</html>
