<?php
    if (isset($_SESSION['id'])) {
      
      header("Location: ./dashboard/");
    }
  include "./view/header.php";
?>
  <body>
    <div class="container form-container">
      <form class="signup-form" id="signup-form">
        <h4 class="text-center text-info">PLS: SIGNUP</h4>
        <div
          class="register-error error mt-1 mb-1 text-danger"
          id="register-error"
        ></div>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            placeholder="USERNAME"
            id="username"
            autocomplete="off"
          />
          <div class="error username-error" id="username-error">
            USERNAME ERROR
          </div>
        </div>

        <div class="form-group">
          <input
            type="email"
            class="form-control"
            placeholder="EMAIL ADDRESS"
            id="email"
            autocomplete="off"
          />
          <div class="error email-error" id="email-error">EMAIL ERROR</div>
        </div>
        <div class="form-group">
          <input
            type="number"
            class="form-control"
            placeholder="PHONE NUMBER"
            id="number"
            class="number"
            autocomplete="off"
          />
          <div class="error number" id="number-error">NUMBER ERROR</div>
        </div>
        <div class="form-group">
          <input
            type="password"
            class="form-control"
            placeholder="PASSWORD"
            id="password"
            class="password"
          />
          <div class="error password-error" id="password-error">
            PASSWORD ERROR
          </div>
        </div>
        <div class="form-group">
          <input
            type="password"
            class="form-control"
            placeholder="CONFIRM PASSWORD"
            id="confirm-password"
          />

          <div class="error confirm-password-error" id="confirm-password-error">
            CONFRIM PASSWORD ERROR
          </div>
        </div>
        <div class="form-group btn-signup">
          <input
            type="submit"
            class="btn btn-info"
            value="Sign up"
            id="register"
          />
          <span class="text-right text-info"
            ><a href="login.php">ALREADY HAS AN ACCOUNT?</a></span
          >
        </div>
      </form>
    </div>
    <script src="vendor/sydeestack.js"></script>
    <script src="vendor/signup.js"></script>
  </body>
</html>
