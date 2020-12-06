let sf = i("signup-form");
let s = i("register");
let u = i("username");
let e = i("email");
let n = i("number");
let p = i("password");
let cp = i("confirm-password");

// ERRORS
let ue = i("username-error");
let ee = i("email-error");
let ne = i("number-error");
let pe = i("password-error");
let cpe = i("confirm-password-error");
let re = i("register-error");

{
  // USERNAME VALIDATION

  u.onkeyup = function () {
    u.value = u.value.toLowerCase();
    if (u.value.trim().length < 1) {
      ue.innerHTML = "USERNAME IS REQUIRED";
      ue.style.visibility = "visible";
    } else if (isNumber(u.value[0])) {
      ue.innerHTML = "USERNAME CAN'T START WITH NUMBER";
      ue.style.visibility = "visible";
    } else if (hasWhiteSpace(u.value.trim())) {
      ue.innerHTML = "USERNAME CONTAIN SPACE";
      ue.style.visibility = "visible";
    } else if (u.value.trim().length < 5) {
      ue.innerHTML = "MINIMUM OF 5 CHARACTER";
      ue.style.visibility = "visible";
    } else {
      ue.innerHTML = "";
      ue.style.visibility = "hideen";
    }
  };

  u.onblur = function (e) {
    if (u.value.trim().length < 1) {
      ue.innerHTML = "USERNAME IS REQUIRED";
      ue.style.visibility = "visible";
    } else if (isNumber(u.value[0])) {
      ue.innerHTML = "USERNAME CAN'T START WITH NUMBER";
      ue.style.visibility = "visible";
    } else if (hasWhiteSpace(u.value.trim())) {
      ue.innerHTML = "USERNAME CONTAIN SPACE";
      ue.style.visibility = "visible";
    } else if (u.value.trim().length < 5) {
      ue.innerHTML = "MINIMUM OF 5 CHARACTER";
      ue.style.visibility = "visible";
    } else {
      ue.innerHTML = "<span class='text-success mb-2'>Checking...</span>";
      ue.style.visibility = "visible";
      // AJAX REQUEST
      let uCheck = new XMLHttpRequest();
      uCheck.onreadystatechange = function () {
        if ((this.readyState = 4 && this.status == 200)) {
          if (this.responseText === "OK") {
            ue.innerHTML = this.responseText;
            ue.style.visibility = "visible";
            ue.style.color = "rgb(0, 120, 0)";
          } else {
            ue.innerHTML = this.responseText;
            ue.style.visibility = "visible";
            ue.style.color = "rgb(120, 0, 0)";
          }
        } else {
          ue.innerHTML = "";
        }
      };
      uCheck.open("POST", "./control/signup.php", true);
      uCheck.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      uCheck.send(`username=${u.value}&userCheck=1`);
    }
  };

  e.onkeyup = function () {
    e.value = e.value.toLowerCase();
    if (e.value.trim().length < 1) {
      ee.innerHTML = "EMAIL IS REQUIRED";
      ee.style.visibility = "visible";
    } else if (!validateEmail(e.value.trim())) {
      ee.innerHTML = "INVALID EMAIL";
      ee.style.visibility = "visible";
    } else {
      ee.innerHTML = "";
      ee.style.visibility = "hideen";
    }
  };

  e.onblur = function () {
    e.value = e.value.toLowerCase();
    if (e.value.trim().length < 1) {
      ee.innerHTML = "EMAIL IS REQUIRED";
      ee.style.visibility = "visible";
    } else if (!validateEmail(e.value.trim())) {
      ee.innerHTML = "INVALID EMAIL";
      ee.style.visibility = "visible";
    } else {
      ee.innerHTML = "<span class='text-success mb-2'>Checking...</span>";
      // ee.style.visibility = "hideen";

      // CHECK MAIL
      let eCheck = new XMLHttpRequest();
      eCheck.onreadystatechange = function () {
        if ((this.readyState = 4 && this.status == 200)) {
          if (this.responseText == "OK") {
            ee.innerHTML = this.responseText;
            ee.style.visibility = "visible";
            ee.style.color = "rgb(0, 120, 0)";
          } else {
            ee.innerHTML = this.responseText;
            ee.style.visibility = "visible";
            ee.style.color = "rgb(120, 0, 0)";
          }
        } else {
          ee.innerHTML = "";
        }
      };
      eCheck.open("POST", "./control/signup.php", true);
      eCheck.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      eCheck.send(`email=${e.value}&emailCheck=1`);
    }
  };

  n.onblur = function () {
    if (n.value.trim().length < 1) {
      ne.innerHTML = "PHONE NUMBER IS REQUIRED";
      ne.style.visibility = "visible";
    } else if (n.value.trim().length < 10) {
      ne.innerHTML = "INVALID PHONE NUMBER";
      ne.style.visibility = "visible";
    } else {
      ne.innerHTML = "";
    }
  };

  // CHECK PASSWORD
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
      pe.style.height = "inherit";
      pe.style.visibility = "visible";
      return false;
    }
    return true;
  }

  p.onkeyup = function () {
    if (validatePassword(p.value) == false) {
      validatePassword(p.value);
      pe.style.visibility = "visible";
    } else {
      pe.innerHTML = "";
      pe.style.visibility = "";
      pe.style.height = "13px";
    }
  };

  cp.onkeyup = function () {
    if (cp.value.length < 1) {
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
}
sf.onsubmit = function (event) {
  event.preventDefault();
  if (
    u.value.trim().length < 1 ||
    e.value.trim().length < 1 ||
    n.value.trim().length < 1 ||
    p.value.length < 1 ||
    cp.value.length < 1
  ) {
    re.innerHTML = "ALL FIELD REQUIRED";
    re.style.visibility = "visible";

    // USERNAME CHECK
  } else if (
    isNumber(u.value.trim()[0]) ||
    hasWhiteSpace(u.value.trim()) ||
    u.value.trim().length < 5
  ) {
    re.innerHTML = "INVALID USERNAME";
    re.style.visibility = "visible";
  } else if (!validateEmail(e.value.trim())) {
    re.innerHTML = "INVALID EMAIL";
    re.style.visibility = "visible";
  } else if (n.value.trim().length < 10) {
    re.innerHTML = "INVALID PHONE NUMBER";
    re.style.visibility = "visible";
  } else if (validatePassword(p.value) == false) {
    re.innerHTML = "INVALID PASSWORD";
    re.style.visibility = "visible";
  } else if (cp.value !== p.value) {
    re.innerHTML = "PASSWORD MISMATCH";
    re.style.visibility = "visible";
  } else {
    re.innerHTML = "<span class='text-success mb-2'>LOADING...</span>";
    let sfAjax = new XMLHttpRequest();
    sfAjax.onreadystatechange = function () {
      re.innerHTML = "LOADING...";
      re.style.visibility = "visible";
      if ((this.readyState = 4 && this.status == 200)) {
        if (this.responseText === "SUCCESS") {
          re.innerHTML = this.responseText;
          re.style.visibility = "visible";
          re.style.color = "rgb(0, 120, 0)";
          sf.reset();
          ue.innerHTML = "";
          ee.innerHTML = "";
        } else {
          re.innerHTML = this.responseText;
          re.style.visibility = "visible";
          re.style.color = "rgb(120, 0, 0)";
        }
        re.innerHTML = this.responseText;
        re.style.visibility = "visible";
      } else {
        re.innerHTML = "";
      }
    };
    sfAjax.open("POST", "./control/signup.php", true);
    sfAjax.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    sfAjax.send(
      `u=${u.value}&e=${e.value}&n=${n.value}&p=${p.value}&cp=${cp.value}&r=1`
    );
  }
};
