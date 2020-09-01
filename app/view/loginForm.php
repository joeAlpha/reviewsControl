<div class="container col text-center" id="accessContainer">
		
		<div class="card bg-dark m-auto w-75">
			<div class="card-header">
				<i class="fas fa-sign-in-alt text-white icon-big"></i>
				<br>

				<h2 class="text-center text-light">
					Login
				</h2>
			</div>

			<div class="card-body">
				<form method="POST" action="" id="loginForm">
					<div class="form-group">
						<input type="text" class="form-control" name="user" id="user" placeholder="Username/e-mail">
					</div>

					
					<div class="form-group">
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>

					<div class="text-center">
						<button onclick="checkLogin()" type="submit" class="btn btn-success btn-lg btn-block mb-4">
							<i class="fas fa-sign-in-alt"></i> Login
						</button>
						
						<button type="button" onclick="loadSignUpView()" class="btn btn-lg btn-primary btn-block">
							<i class="fas fa-user-plus"></i>
							Create account
						</button>
					</div>

					<div class="container my-4">
						<a href="" class="badge badge-primary">
							I forgot my password
						</a>
					</div>
					
				</form>
			</div>
		</div>
		<div class="m-auto pt-3 w-75" id="alertContainer"></div>
	</div>