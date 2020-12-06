<?php
  include "./view/header.php";
?>


  <body>
    <div class="container form-container">
      <form class="login-form" id="login-form">
        <h5 class="text-center text-info">PLS: LOGIN</h5>
        <div class="error login-error text-danger" id="login-error"></div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="USERNAME OR EMAIL ADDRESS"
            id="username"
            autocomplete="off"
          />
          <div class="error username-error" id="username-error">
            USERNAME ERROR
          </div>
        </div>
        <div class="form-group">
          <input
            type="password"
            class="form-control"
            placeholder="PASSWORD"
            id="password"
          />
          <div class="error password-error" id="password-error">
            PASSWORD ERROR
          </div>
        </div>
        <div class="form-group btn-signup">
          <input type="submit" class="btn btn-info" value="Login" />
          <span class="text-right text-info"
            ><a href="signup.php">CREATE AN ACCOUNT</a></span
          >
        </div>
        <div class="text-left text-info">
          <span><a href="./resetPassword.php">Reset Password</a></span>
        </div>
      </form>
    </div>
    <script src="vendor/sydeestack.js"></script>
    <script src="vendor/login.js"></script>
  </body>
</html>
