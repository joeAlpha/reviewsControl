<div id="signUpContainer">
    <div class="card bg-dark h-100 m-auto w-75">

    <div class="card-header text-center text-light">
        <i class="fas fa-user-plus text-light icon-big my-2"></i>
        <br>
        <h2>Create a new account</h2>
    </div> <!-- Card header -->

    <div class="card-body">
        <form id="signUpForm" action="" method="POST">

            <div class="form-group">
                <input placeholder="Your username" type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <input placeholder="Password" type="password" name="passCheck1" id="passCheck1" class="form-control">
            </div>

            <div class="form-group">
                <input placeholder="Confirm your password" type="password" name="passCheck2" id="passCheck2" class="form-control">
            </div>

            <div class="form-group">
                <input placeholder="e-mail" type="e-mail" name="email" id="e-mail" class="form-control">
            </div>

            <div class="form-group">

                <button class="btn btn-success btn-lg btn-block mb-4" type="submit" value="Save topic" name="saveTopic" onclick="signUp()">
                    <i class="fas fa-sign-in-alt icon-small"></i> Register
                </button>

                <button class="btn btn-primary btn-lg btn-block" type="submit" value="Save topic" name="saveTopic" onclick="loadLoginView()">
                    <i class="fas fa-user icon-small mx-1"></i> I've an account
                </button>
                
            </div>
        </form>
    </div> <!-- Card body -->
    </div> <!-- Card -->
</div>
<div id="signUpAlerts"></div>