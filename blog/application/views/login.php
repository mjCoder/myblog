    <header class="intro-header" style="background-image: url('img/login-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="loginbox">
            <div class="panel white-alpha-90">
                <div class="panel-heading">
                	<div class="panel-title text-center"><h2>Sign In to <span class="text-primary">Blog</span></h2></div>
                </div>
                <div class="panel-body">
                	<div class="alert alert-danger col-sm-12" id="login-alert" style="display:none"></div>
                	<form role="form" class="form-horizontal" id="loginform">
                        <div class="input-group">
                        	<span class="input-group-addon"><i class="fa fa-user"></i></span>
                        	<input type="text" placeholder="username" value="" name="username" class="form-control" id="login-username">
                        </div>
                        <div class="input-group">
                        	<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        	<input type="password" placeholder="password" name="password" class="form-control" id="login-password">
                        </div>
                        <div class="input-group col-xs-12 text-center login-action">
                          <div class="checkbox">
                        	<label>
                        	  <span id="btn-login"><a class="btn btn-success" href="#">Login  </a></span>
                        	</label>
                          </div>
                        </div>
                        <div class="form-group" style="margin-top:10px">
                        	<div class="col-sm-12 controls">
                        		<a href="<?php echo base_url('register') ?>">Register</a>
                        	</div>
                        </div>
                	</form>
                </div>
            </div>
        </div>
    </div>


