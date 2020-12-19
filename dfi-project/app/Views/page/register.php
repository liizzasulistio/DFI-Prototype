<?= $this->extend('layout/template')?>

<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-3 pt-3 pb-3 bg-white form-wrapper mb-3"> 
            <div class="container">
            <h3>Register to DFI Project</h3>
            <hr>
            <form action="/register" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group mb-1">
                    <label for="UserName">Name</label>
                    <input type="text" class="form-control" name="UserName" id="UserName" value="<?= set_value('UserName')?>" autofocus>
                </div>
            
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="UserUsername">Username</label>
                        <input type="text" class="form-control" name="UserUsername" id="UserUsername" value="<?= set_value('UserUsername')?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="UserEmail">Email</label>
                        <input type="text" class="form-control" name="UserEmail" id="UserEmail" value="<?= set_value('UserEmail')?>">
                    </div>
                </div>
            
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="UserPassword">Password</label>
                        <input type="password" class="form-control" name="UserPassword" id="UserPassword" value="">
                    </div>
                </div>
                <div class="col-12 col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="PasswordConfirm">Confirm Password</label>
                        <input type="password" class="form-control" name="PasswordConfirm" id="PasswordConfirm" value="">
                    </div>
                </div><hr>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="UserHometown">Hometown</label>
                        <input type="text" class="form-control" name="UserHometown" id="UserHometown" value="<?= set_value('UserHometown')?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="UserBirthday">Birthday</label>
                        <input type="date" class="form-control" name="UserBirthday" id="UserBirthday" value="<?= set_value('UserBirthday')?>">
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="UserTwitter">Twitter</label>
                        <input type="text" class="form-control" name="UserTwitter" id="UserTwitter" value="<?= set_value('UserTwitter')?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="UserInstagram">Instagram</label>
                        <input type="text" class="form-control" name="UserInstagram" id="UserInstagram" value="<?= set_value('UserInstagram')?>">
                    </div>
                </div><hr>

                <div class="form-group mb-1">
                    <label for="UserFanart" class="form-label">Please upload your fanart here</label>
                    <input type="file" class="form-control" name="UserFanart" id="UserFanart" value="">
                </div>
                <div class="form-group mb-1">
                    <label for="UserReason">Why do you want to join us?</label>
                    <textarea class="form-control" name="UserReason" id="UserReason"><?= set_value('UserBio')?></textarea>
                </div>

                <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                    <label class="form-check-label" for="flexCheckDefault">
                    <a type="button" data-bs-toggle="modal" class="link-primary" data-bs-target="#exampleModal">Terms & Conditions</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Terms & Conditions</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>I don't even know how I can talk to you now</p>
                            <p>It's not you, the "you" who talks to me anymore</p>
                            <p>And, sure, I know that sometimes it gets hard</p>
                            <p>But even with all my love, what we had, you just gave it up</p>
                            <p></p>
                            <p>Thought we were meant to be</p>
                            <p>I thought that you belonged to me</p>
                            <p>I'll play the fool instead</p>
                            <p>Oh, but then I know that this is the end, oh-oh</p>
                            <p></p>
                            <p>Congratulations, glad you're doin' great (Oh)</p>
                            <p>Congratulations. How are you? Okay? (Oh)</p>
                            <p>How could it be so fine, can see it in your eyes</p>
                            <p>The same look that you gave me that kills me inside, oh</p>
                            <p></p>
                            <p>I don't even need to ask, yeah, I know you too damn well, yeah</p>
                            <p>I can see that smile and can tell that you did more than move on</p>
                            <p>I hate that you're happy, I hope that you can't sleep</p>
                            <p>Just knowing that I could be with somebody new</p>
                            <p> That I'd be just like you</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    </label>
                </div>
                </div>          
            </div>
            <a href="/login">Already have an account?</a>
                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection()?>