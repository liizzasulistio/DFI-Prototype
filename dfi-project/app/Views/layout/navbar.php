<?php
  $uri = service('uri');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand nav-text" href="<?= base_url('/'); ?>">
    <img src="https://i.imgur.com/69lLWuY.png" alt="DFI Logo" width="30" height="30">
    DFI Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if(session()->get('isLoggedIn')): ?>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?> nav-text" href="/dashboard">Dashboard</a>
        <a class="nav-link <?= ($uri->getSegment(1) == 'project' ? 'active' : null) ?> nav-text" href="/project">Project</a>
       
       
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-text" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= session()->get('UserUsername')?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="/profile">My Profile</a></li>
              <li><a class="dropdown-item" href="/edit-profile">Edit Profile</a></li>
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Logout</a></li>
          </ul>
        </li>
        </ul>
      
      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Ready to Logout?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Select "Logout" below if you are ready to end your session.
            </div>
            <div class="modal-footer">
              <a class="btn btn-secondary" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
              <a href="/logout" class="btn btn-primary">Logout</a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>  
  </div>
</nav>