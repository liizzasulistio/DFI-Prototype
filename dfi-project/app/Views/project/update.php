<?= $this->extend('layout/template') ?>
<?php use CodeIgniter\I18n\Time;?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col"><br>
        <div class="card">
        <div class="card-header">
            <h3>Edit Project</h3>
        </div>
        <form action="/add-project" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="card-body">
        <div class="row mb-10">
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectTitle">Title</label>
                    <input type="text" class="form-control" name="ProjectTitle" id="ProjectTitle" value="<?= set_value('ProjectTitle', $project['ProjectTitle']) ?>" autofocus>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectCategory_FK">Category</label>
                    <!-- <input type="text" class="form-control" name="ProjectTitle" id="ProjectTitle" value="" autofocus> -->
                    <select class="form-select" name="ProjectCategory_FK" id="ProjectCategory_FK"> 
                        <!-- aria-label="Default select example"> -->
                    <!-- <option selected>Choose Category</option> -->
                    <?php $i = 1; ?> 
                    <?php foreach($category as $c) : ?><?php $i++;?>
                    <option value="<?= $c['CategoryID']?>"><?= $c['CategoryName']?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectStart">Registration Start</label>
                    <input type="datetime-local" class="form-control" name="ProjectStart" id="ProjectStart" value="<?=($project['ProjectStart']) ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectEnd">Registration End</label>
                    <input type="datetime-local" class="form-control" name="ProjectEnd" id="ProjectEnd" value="<?=($project['ProjectEnd']) ?>">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectDeadline">Deadline</label>
                    <input type="datetime-local" class="form-control" name="ProjectDeadline" id="ProjectDeadline" value="<?=($project['ProjectDeadline']) ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectPost">Post</label>
                    <input type="datetime-local" class="form-control" name="ProjectPost" id="ProjectPost" value="<?=($project['ProjectPost']) ?>">
                </div>
            </div>

            
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectColor">Color Palette</label>
                    <input type="text" class="form-control" name="ProjectColor" id="ProjectColor" value="<?=($project['ProjectColor']) ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectCanvas">Canvas Size</label>
                    <input type="text" class="form-control" name="ProjectCanvas" id="ProjectCanvas" value="<?=($project['ProjectCanvas']) ?>">
                </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group mb-1">
                <label for="ProjectDescription">Description</label>
                <textarea type="text" class="form-control" name="ProjectDescription" id="ProjectDescription" style="height: 107px;"></textarea>
            </div>
            </div>


            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
         
            <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>

        </div>
        
        





        </form>




        </div>
            
        </div>
    </div>
</div>

<?= $this->endSection()?>