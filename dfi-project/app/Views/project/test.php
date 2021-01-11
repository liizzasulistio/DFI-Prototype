<?= $this->extend('layout/template') ?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col"><br>
        <div class="card">
        <div class="card-header">
            <h3>Add New Project</h3>
        </div>
        <form action="/add-project" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="card-body">
        <div class="row mb-10">
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectTitle">Title</label>
                    <input type="text" class="form-control <?= ($validation->hasError('ProjectTitle')) ? 'is-invalid' : ''; ?>" name="ProjectTitle" id="ProjectTitle" value="<?= set_value('ProjectTitle')?>" autofocus>
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectTitle'); ?>
                    </div>
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
                    <input type="datetime-local" class="form-control <?= ($validation->hasError('ProjectStart')) ? 'is-invalid' : ''; ?>" name="ProjectStart" id="ProjectStart" value="<?= set_value('ProjectStart')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectStart'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectEnd">Registration End</label>
                    <input type="datetime-local" class="form-control <?= ($validation->hasError('ProjectEnd')) ? 'is-invalid' : ''; ?>" name="ProjectEnd" id="ProjectEnd" value="<?= set_value('ProjectEnd')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectEnd'); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectDeadline">Deadline</label>
                    <input type="datetime-local" class="form-control <?= ($validation->hasError('ProjectDeadline')) ? 'is-invalid' : ''; ?>" name="ProjectDeadline" id="ProjectDeadline" value="<?= set_value('ProjectDeadline')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectDeadline'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectPost">Post</label>
                    <input type="datetime-local" class="form-control <?= ($validation->hasError('ProjectPost')) ? 'is-invalid' : ''; ?>" name="ProjectPost" id="ProjectPost" value="<?= set_value('ProjectPost')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectPost'); ?>
                    </div>
                </div>
            </div>

            
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectColor">Color Palette</label>
                    <input type="text" class="form-control <?= ($validation->hasError('ProjectColor')) ? 'is-invalid' : ''; ?>" name="ProjectColor" id="ProjectColor" value="<?= set_value('ProjectColor')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectColor'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectCanvas">Canvas Size</label>
                    <input type="text" class="form-control <?= ($validation->hasError('ProjectCanvas')) ? 'is-invalid' : ''; ?>" name="ProjectCanvas" id="ProjectCanvas" value="<?= set_value('ProjectCanvas')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectCanvas'); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group mb-1">
                <label for="ProjectDescription">Description</label>
                <textarea type="text" class="form-control <?= ($validation->hasError('ProjectDescription')) ? 'is-invalid' : ''; ?>" name="ProjectDescription" id="ProjectDescription" style="height: 107px;"><?= set_value('ProjectDescription')?></textarea>
                <div class="invalid-feedback">
                <?= $validation->getError('ProjectDescription'); ?>
                </div>
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