<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<div class="container">
    <div class="col"><br>
    <?php
        if (session()->get('UserType') == 'Project Officer')
        {
            $addButton = ' <a href="/add-project" class="btn btn-success">Add Project</a>';
            echo $addButton;
        }
        ?>
        <!-- <a href="/add-project" class="btn btn-success">Add Project</a> -->
    </div>
  <div class="row">
  <div class="col">
  <form method="get">
  <div class="input-group mb-2 mt-2">
    <input type="text" class="form-control" placeholder="Search Project Title or Category" name="keyword">
    <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
  </div>
  </form>
  </div>





  </div>
<?php if(session()->getFlashdata('message')) : ?>
  <div class="alert alert-light mt-2" role="alert">
    <?= session()->getFlashdata('message'); ?>
  </div>
<?php endif; ?>
<div class="col mt-2">
<div class="row">
<?php $i = 1 + (10 * ($currentPage - 1)); ?> 
    <?php foreach($project as $p) : ?>
<div class="accordion mb-2" id="accordionExample">
  <div class="accordion-item" style="background-color:wheat;">
    <h2 class="accordion-header" id="<?= $p['slug']?>">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$i?>" aria-expanded="false" aria-controls="collapseOne<?=$i?>">
      <?= $i;?>   <?= $p['ProjectTitle']?>
      </button>
    </h2>
    <div id="collapseOne<?=$i?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?=$i?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">

      <div class="row">
      <div class="col">

      <div class="row">
      <!-- Left Column -->
      <div class="col-6">
      <div class="container mb-2" style="background-color: white;">
        <!-- Project Details -->
        <table class="table table-borderless table-sm">
        <tr><th>Category: <?= $p['CategoryName']?></th></tr>
        <tr><td>Registration Start: <?= $p['ProjectStart']?></td></tr>
        <tr><td>Registration End: <?= $p['ProjectEnd']?></td></tr>
        <tr><td>Deadline: <?= $p['ProjectDeadline']?></td></tr>
        <tr><td>Post: <?= $p['ProjectPost']?></td></tr>
        <tr><td>Color Palette: <?= $p['ProjectColor']?></td></tr>
        <tr><td>Canvas Size: <?= $p['ProjectCanvas']?></td></tr>
        <tr><td>Description: <?= $p['ProjectDescription']?></td></tr>
        </table>
      
        <!-- Add New Participate + Pop Up Notifications -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="submit" class="btn btn-primary mb-2">Participate</button>
        </div>
      </div>
      </div>

      <!-- Right Column -->
      <div class="col-6">
      <div class="container" style="background-color: white;">
      <p>Participants List</p>
      <?php //foreach($participant as $par) : ?>
      <?//= $par['UserUsername']?><?php //endforeach;?>
      </div>
      </div>
      </div>

      <!-- Showing Edit and Delete Button for Project Officer -->
      <?php if(session()->get('UserType') == 'Project Officer'): ?>
        <a href="/edit-project/<?= $p['slug']?>" class="btn btn-warning">Edit</a>
        <a  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$i?>">Delete</a>
      <?php endif;?>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop<?=$i?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?=$i?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Are you sure you want to delete this project?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Select "Delete" below if you are sure to delete this project.
              This action can't be undone.
            </div>
            <div class="modal-footer">
              <a class="btn btn-secondary" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
              <a href="/delete-project/<?= $p['ProjectID']?>" class="btn btn-primary">Delete</a>
            </div>
          </div>
        </div>
      </div>
      </div> <!-- End Col -->
      
      </div> <!-- End Row -->
      
      </div>
        
      </div>
    </div>
  </div>
  <?php $i++;?>
    <?php endforeach; ?>
   <br> <?= $pager->links('project', 'project_pagination'); ?>
</div>
</div>
</div>
<?= $this->endSection()?>