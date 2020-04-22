	<div id="login">
   	      <h3>Login</h3>
          <form ng-submit="loginUser()">
							<span ng-bind-html="login_error" ng-show="login_error"></span>
            <div class="form-group">
              <input type="text" class="form-control" ng-model="login.email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" ng-model="login.password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button type="submit" id="loginBtnService" name="loginBtnService" class="btn btn-primary btn-sm btn-block">Sign In &nbsp;<i class="fas fa-sign-in-alt"></i> </button>
            </div>
             <div class="form-group">

              <button type="button"   class=" loadSignUp btn btn-outline-primary btn-sm btn-block"> <i class="fas fa-file"></i> &nbsp;Sign Up </button>
            </div>
            <div class="form-group forget-password">
                 <a href="#" class="loadForgot"><i class="fas fa-key"></i> Forget Password</a>
            </div>
          </form>
   			</div>
