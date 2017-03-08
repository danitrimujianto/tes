<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6">
								<h2>Login</h2>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
                    	<?php if(isset($_SESSION["error_code"])){ ?>
                            	<div class="row">
                                	<div class="col-md-12">
                                    	<span style=" color: #F00; "><?php echo $_SESSION["error_code"]; unset($_SESSION["error_code"]); ?></span>
                                    </div>
                                </div>
                                <?php } ?>
						<div class="row">
							<div class="col-lg-12">
                            	
								<form id="login-form" action="proses-login.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username / Email" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
                                            	<button type="submit" class="btn btn-primary">Log In</button>
                                            	<button type="reset" class="btn btn-danger">Reset</button>
													
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>