<?= $this->extend('layout/template')?>
<?php use CodeIgniter\I18n\Time;?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col"><br>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $user['UserUsername']?></h3>
            </div>
            <div class="card-body">
                <div class="row mb-10">
                <div class="col-4">
                    <ul>
                    <li><img src="images/<?= $user['UserAva']?>" class="ava mx-auto d-block"></li><!-- Jangan lupa ganti jadi avanya user -->
                    <li class="mt-3"><?= $user['UserName']?></li>
                    <li><?= Time::parse($user['created_at'])->toDateString() ?></li>
                    <hr>
                    <li><?= $user['UserHometown']?></li>
                    <li><?= $user['UserBirthday']?></li>
                    <hr>
                    <li><img src="icons/email.png" class="soc-med"> <?= $user['UserEmail']?></li>
                    <li><img src="icons/twitter.png" class="soc-med"> <?= $user['UserTwitter']?></li>
                    <li><img src="icons/instagram.png" class="soc-med"> <?= $user['UserInstagram']?></li>
                    <hr>
                    <li><?= $user['UserBio']?></li>
                    <hr>
                    <li><a href="/edit-profile" class="btn btn-warning">Edit Profile</a></li>
                    </ul>
                </div>

                <!-- Menampilkan Fanart dari User -->
                <!-- Jangan lupa diganti -->
                <div class="col-8">
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
            </div>
        </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>