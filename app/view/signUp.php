<div id="signUpContainer">
    <div class="card bg-dark h-100">

    <div class="card-header text-center text-light">
        <i class="fas fa-book-open text-light icon-big my-2"></i>
        <br>
        Create a new account
    </div> <!-- Card header -->

    <div class="card-body">
        <form id="userForm" action="" method="POST">

            <div class="form-group">
                <input placeholder="Topic's name" type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <select class="form-control custom-select" id="subject" name="subject">
                    
                </select>
            </div>

            <div class="form-group">
                <input placeholder="Or type a new subject" type="text" name="newSubject" id="newSubject" class="form-control">
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-lg btn-block" type="submit" value="Save topic" name="saveTopic" onclick="registerNewTopic()">
                    <i class="fas fa-save icon-small mx-1"></i> Save
                </button>
            </div>
        </form>
    </div> <!-- Card body -->
    </div> <!-- Card -->
</div>