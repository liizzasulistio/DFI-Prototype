<?= $this->extend('layout/template') ?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col"><br>
        <div class="card">
        <div class="card-header">
            <h3>Add New Project</h3>
        </div>
        <form action="/save-project" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="card-body">
        <div class="row mb-10">
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectTitle">Title</label>
                    <input type="text" class="form-control <?= ($validation->hasError('ProjectTitle')) ? 'is-invalid' : ''; ?>" name="ProjectTitle" id="ProjectTitle" value="<?= old('ProjectTitle')?>" autofocus>
                    <div class="invalid-feedback">
                        <?= $validation->getError('ProjectTitle'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectCategory_FK">Category</label>
                    <select class="form-select" name="ProjectCategory_FK" id="ProjectCategory_FK"> 
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
                    <input type="datetime-local" class="form-control  <?= ($validation->hasError('ProjectStart')) ? 'is-invalid' : ''; ?>" name="ProjectStart" id="ProjectStart" value="<?= old('ProjectStart')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectStart'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectEnd">Registration End</label>
                    <input type="datetime-local" class="form-control <?= ($validation->hasError('ProjectEnd')) ? 'is-invalid' : ''; ?>" name="ProjectEnd" id="ProjectEnd" value="<?= old('ProjectEnd')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectEnd'); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectDeadline">Deadline</label>
                    <input type="datetime-local" class="form-control <?= ($validation->hasError('ProjectDeadline')) ? 'is-invalid' : ''; ?>" name="ProjectDeadline" id="ProjectDeadline" value="<?= old('ProjectDeadline')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectDeadline'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectPost">Post</label>
                    <input type="datetime-local" class="form-control <?= ($validation->hasError('ProjectPost')) ? 'is-invalid' : ''; ?>" name="ProjectPost" id="ProjectPost" value="<?= old('ProjectPost')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectPost'); ?>
                    </div>
                </div>
            </div>

            
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectColor">Color Palette</label>
                    <input type="text" class="form-control <?= ($validation->hasError('ProjectColor')) ? 'is-invalid' : ''; ?>" name="ProjectColor" id="ProjectColor" value="<?= old('ProjectColor')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectColor'); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-1">
                    <label for="ProjectCanvas">Canvas Size</label>
                    <input type="text" class="form-control <?= ($validation->hasError('ProjectCanvas')) ? 'is-invalid' : ''; ?>" name="ProjectCanvas" id="ProjectCanvas" value="<?= old('ProjectCanvas')?>">
                    <div class="invalid-feedback">
                    <?= $validation->getError('ProjectCanvas'); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
            <div class="form-group mb-1">
                <label for="ProjectDescription">Description</label>
                <textarea type="text" class="form-control" name="ProjectDescription" id="ProjectDescription" style="height: 107px;"><?= old('ProjectDescription')?></textarea>
            </div>
            </div>


            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
         
          

        </div>
        
        





        </form>




        </div>
            
        </div>
    </div>
</div>

<?= $this->endSection()?>