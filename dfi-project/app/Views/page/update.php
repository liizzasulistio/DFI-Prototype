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
        <form action="/edit-profile" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row mb-10">
            <div class="col-sm-4">
                <ul>
                    <li><img src="images/<?= $user['UserAva']?>" class="ava mx-auto d-block ava-preview"></li>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="UserAva" class="form-label">Change Avatar</label>
                            <input type="file" class="form-control" name="UserAva" id="UserAva" onchange="avatar()">
                        </div>
                    </div>
                </ul>
            </div>

            <div class="col-sm-8">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserID">User ID</label>
                        <input type="text" class="form-control" name="UserID" id="UserID" value="<?=($user['UserID'])?>" disabled readonly>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserType">User Type</label>
                        <input type="text" class="form-control" name="UserType" id="UserType" value="<?=($user['UserType_FK'])?>" disabled readonly>
                    </div>
                </div>
                </div>

                <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserName">Name</label>
                        <input type="text" class="form-control" name="UserName" id="UserName" value="<?= set_value('UserName', $user['UserName']) ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserUsername">Username</label>
                        <input type="text" class="form-control" name="UserUsername" id="UserUsername" value="<?= set_value('UserUsername', $user['UserUsername']) ?>">
                    </div>
                </div>
                </div>

                <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserHometown">Hometown</label>
                        <input type="text" class="form-control" name="UserHometown" id="UserHometown" value="<?= set_value('UserHometown', $user['UserHometown']) ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserBirthday">Birthday</label>
                        <input type="date" class="form-control" name="UserBirthday" id="UserBirthday" value="<?= set_value('UserBirthday', $user['UserBirthday']) ?>">
                    </div>
                </div>
                </div>
                <hr>

                <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserEmail">Email</label>
                        <input type="text" class="form-control" name="UserEmail" id="UserEmail" value="<?= set_value('UserEmail', $user['UserEmail']) ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="created_at">Joined Since</label>
                        <input type="date" class="form-control" name="created_at" id="created_at" value="<?= Time::parse($user['created_at'])->toDateString() ?>" disabled readonly>
                    </div>
                </div>
                </div>
                
                <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="UserPassword">Password</label>
                        <input type="password" class="form-control" name="UserPassword" id="UserPassword">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="PasswordConfirm">Confirm Password</label>
                        <input type="password" class="form-control" name="PasswordConfirm" id="PasswordConfirm">
                    </div>
                </div>
                </div>
                <hr>
            </div>

            <div class="col-sm-4">
            </div>

            <div class="col-sm-8">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="form-group mb-2">
                        <label for="UserTwitter">Twitter</label>
                        <input type="text" class="form-control" name="UserTwitter" id="UserTwitter" value="<?= set_value('UserTwitter', $user['UserTwitter']) ?>">
                    </div>
                    <div class="form-group">
                        <label for="UserInstagram">Instagram</label>
                        <input type="text" class="form-control" name="UserInstagram" id="UserInstagram" value="<?= set_value('UserInstagram', $user['UserInstagram']) ?>">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-3">
                        <label for="UserBio">Introduction</label>
                        <textarea type="text" class="form-control" name="UserBio" id="UserBio" style="height: 107px;"><?= set_value('UserBio', $user['UserBio']) ?></textarea>
                    </div>
                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        </form>
        </div>
        </div>
     </div>
</div>
<?= $this->endSection()?>