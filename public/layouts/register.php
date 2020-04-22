
<div id="successRegPage" style="display: none;">
  <h1 class="text-success text-center"><i class="fas fa-check-circle"></i> <br>Thank You</h1>
	<p class="text-center">Your registration was successful. You can now login to start posting & earning</p>
</div>

	<div id="register" style="display: none;">
   	      <h3 style="">Join Kemfe</h3>
          <form ng-submit="registerData()">
            <div class="form-group">
              <input type="text" class="form-control" ng-model="insert.username" name="username" placeholder="username">
							<span ng-bind-html="username_field_error" ng-show="username_field_error"></span>
					  </div>

             <div class="form-group">
              <input type="text" class="form-control" ng-model="insert.email"  name="email" placeholder="Email">
							<span ng-bind-html="email_field_error" ng-show="email_field_error"></span>
            </div>

            <div class="form-group">
              <input type="password" class="form-control" ng-model="insert.password" name="password" placeholder="Password">
							<span ng-bind-html="password_field_error" ng-show="password_field_error"></span>
					  </div>
            <div class="form-group">
              <button type="submit" name="insertData" id="insertData" class="btn btn-success btn-sm btn-block"> Sign Up &nbsp;<i class="fas fa-sign-in-alt"></i> </button>
            </div>


             <div class="form-group forget-password">
                 Already a member? <a href="#" class="loadSignIn"> Sign In <i class="fas fa-sign-in-alt"></i></a>
            </div>

          </form>
   			</div>
