<?= $this->extend('layout/template')?>

<?= $this->section('content')?>
<!-- Header Message -->
<br>
<?php if(!session()->get('isLoggedIn')): ?>
<div class="py-5 text-center container">
    <div class="col-lh-6 col-md-8 mx-auto">
        <h1 class="fw-light">Welcome to DFI Project!</h1>
        <p class="lead text-muted">I don't even know how I can talk to you now
It's not you, the "you" who talks to me anymore
And, sure, I know that sometimes it gets hard
But even with all my love, what we had, you just gave it up~</p>
        <p>
            <a class="btn btn-primary my-2" href="/login">Login</a>
            <a class="btn btn-secondary my-2" href="/register">Register</a>
        </p>
    </div>
</div>
<?php endif; ?>  
<br>
<!-- Mini Gallery -->
<div class="container">
    <div class="row">
        <div class="col">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="/images/gabjagi_project.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/images/everyduo6_parkbros.jpg" class="d-block w-100" alt="...">
            </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
        </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>