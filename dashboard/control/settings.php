<div class="container">
    <form class="resetPassword" id="resetPassword">
        <div class="error error-reset-password" id="error-reset-password"></div>
        <div class="form-group">
            <input type="text" class="form-control username" id="username" placeholder="USERNAME" value="<?php echo $_SESSION['username']; ?>" disabled>
            <div class="error" id='username-setting-error'></div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control current-password" id="current-password" placeholder="CURRENT PASSWORD">
            <div class="error" id="current-password-setting-error"></div>

        </div>
        <div class="form-group">
            <input type="password" class="form-control password" id="password" placeholder="PASSWORD">
            <div class="error" id="password-setting-error"></div>
        </div>
        <div class="form-group">
            <input type="password" class="form-control confirm-password" id="confirm-password" placeholder="CONFIRM PASSWORD">
            <div class="error" id="confirm-password-setting-error"></div>
        </div>
        <div>
            <input type="submit" class="btn btn-info" value="Reset">
        </div>
    </form>
</div>