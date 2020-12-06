<?php
  include "./view/header.php";
?>


  <body>
    <div class="container form-container">
      <form class="login-form" id="login-form">
        <h5 class="text-center text-info">RESET PASSWORD</h5>
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
          <label for="date" class="color"> Date of Birth</label>
          <input
            type="date"
            class="form-control"
            placeholder="Date of Birth"
            id="date"
          />
          <div class="error password-error" id="password-error">
            PASSWORD ERROR
          </div>
        </div>
        <div class="form-group btn-signup">
          <input type="submit" class="btn btn-info" value="Reset" />
          <span class="text-right color"
            ><a href="signup.php" class="color">CREATE AN ACCOUNT</a></span
          >
        </div>
        <div class="text-left text-color">
          <span><a href="./login.php" class="color">Already has an account</a></span>
        </div>
      </form>
    </div>
    <script src="vendor/sydeestack.js"></script>
    <script src="vendor/reset.js"></script>
  </body>
</html>
