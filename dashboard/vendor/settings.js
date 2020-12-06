let rp = i("resetPassword");
let u = i("username");
let cp = i("current-password");
let p = i("password");
let confirmPassword = i("confirm-password");
let erp = i("error-reset-password");
let pe = i("password-setting-error");
let cpe = i("confirm-password-setting-error");
let inputs = [cp, p, confirmPassword];

// VALIDATE PASSWORD
function validatePassword(p) {
  let errors = [];
  if (p.length < 8) {
    errors.push("must contain at least 8 characters");
  }
  if (p.search(/[a-z]/i) < 0) {
    errors.push("must contain at least one letter.");
  }
  if (p.search(/[0-9]/) < 0) {
    errors.push(" must contain at least one digit.");
  }
  if (errors.length > 0) {
    pe.innerHTML = errors.join("<br>");
    pe.style.visibility = "visible";
    return false;
  }
  return true;
}

// PASSWORD KEYUP
p.onkeyup = function () {
  if (p.value.length > 0 && validatePassword(p.value) == false) {
    validatePassword(p.value);
    pe.style.visibility = "visible";
  } else {
    pe.style.visibility = "hidden";
  }
};

p.onblur = function () {
  if (p.value.length > 0 && validatePassword(p.value) == false) {
    validatePassword(p.value);
    pe.style.visibility = "visible";
  } else {
    pe.style.visibility = "hidden";
  }
};

// CONFIRM PASSWORD
confirmPassword.onkeyup = function () {
  if (confirmPassword.value.length < 1) {
    cpe.innerHTML = "CONFIRM PASSWORD IS REQUIRED";
    cpe.style.visibility = "visible";
  } else if (cp.value !== p.value) {
    cpe.innerHTML = "PASSWORD MISMATCH";
    cpe.style.visibility = "visible";
  } else {
    cpe.innerHTML = "";
    cpe.style.visibility = "visible";
  }
};

confirmPassword.onblur = function () {
  if (confirmPassword.value.length < 1) {
    cpe.innerHTML = "CONFIRM PASSWORD IS REQUIRED";
    cpe.style.visibility = "visible";
  } else if (cp.value !== p.value) {
    cpe.innerHTML = "PASSWORD MISMATCH";
    cpe.style.visibility = "visible";
  } else {
    cpe.innerHTML = "";
    cpe.style.visibility = "visible";
  }
};
rp.onsubmit = function (e) {
  e.preventDefault();
  if (
    checkForm(p) < 1 ||
    checkForm(cp) < 1 ||
    checkForm(confirmPassword) < 0 ||
    checkForm(u) < 1
  ) {
    erp.innerHTML = "<span class='text-danger'> ALL FIELD REQUIRED</span>";
    erp.style.visibility = "visible";
  } else if (validatePassword(p.value) == false) {
    erp.innerHTML = "ERROR: PASSWORD";
    erp.style.visibility = "visible";
  } else if (confirmPassword.value !== p.value) {
    erp.innerHTML = "PASSWORD MISMATCH";
    erp.style.visibility = "visible";
  } else {
    let data = `resetPassword=1&u=${u.value}&cp=${cp.value}&p=${p.value}&confirmPassword=${confirmPassword.value}`;

    let rpAjax = new XMLHttpRequest();
    rpAjax.onreadystatechange = function () {
      erp.innerHTML = "<span class='text-info'>Loading... </span>";
      if (this.readyState == 4 && this.status == 200) {
        if (
          this.responseText ==
          "<span class='text-info'>PASSWORD CHANGED SUCCESSFULLY</span>"
        ) {
          erp.innerHTML = "Password Changed Successfully!";
          erp.style.visibility = "visible";
          rp.reset();

          location.reload();
        } else {
          erp.innerHTML = this.responseText;
          erp.style.visibility = "visible";
        }
      }
    };
    rpAjax.open("POST", "./control/action.php", true);
    rpAjax.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    rpAjax.send(data);
  }
};
