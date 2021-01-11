<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col">
        <?php $i = 1; ?> 
            <?php foreach($member as $m ) : ?>
        <div class="row mt-3">
            <div class="col-6">
                <div class="card"><?php $i++;?>
                <div class="card-body">
                    <img class="ava" src="images/<?= $m['UserAva']?>" width="100" height="100">
                    <h5 class="card-title d-inline"><?= $m['UserName']?></h5>
                    <h7 class="card-text d-inline"><?= $m['UserUsername']?></h7>
                    <p class="card-text"><?=$m['UserType']?></p>
                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="#" class="btn btn-primary ">View Profile</a></div>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>


<?= $this->endSection()?>