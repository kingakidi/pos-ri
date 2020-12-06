let form = i("login-form");
let u = i("username");
let p = i("password");
let l = i("login");
let ue = i("username-error");
let pe = i("password-error");
let le = i("login-error");

u.onkeyup = function () {
  u.value = u.value.toLowerCase();
  if (u.value.trim().length < 1) {
    ue.innerHTML = "USERNAME IS REQUIRED";
    ue.style.visibility = "visible";
  } else {
    ue.innerHTML = "";
  }
};

p.onkeyup = function () {
  if (p.value.length < 1) {
    pe.innerHTML = "PASSWORD IS REQUIRED";
    pe.style.visibility = "visible";
  } else {
    pe.innerHTML = "";
  }
};

form.onsubmit = function (e) {
  e.preventDefault();

  if (u.value.trim().length < 1 || p.value.length < 1) {
    le.innerHTML = "ALL FIELD REQUIRED";
    le.style.visibility = "visible";
  } else {
    le.innerHTML = "<span class='text-success mb-2'>LOADING...</span>";
    // SEND AJAX
    let lAjax = new XMLHttpRequest();
    lAjax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "SUCCESS") {
          le.innerHTML = "Redirecting...";
          le.innerHTML = this.responseText;
          le.style.visibility = "visible";
          window.location = "./dashboard/index.php";
        } else {
          le.innerHTML = this.responseText;
          le.style.visibility = "visible";
        }
      }
    };
    lAjax.open("POST", "./control/login.php", true);
    lAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    lAjax.send(`username=${u.value}&password=${p.value}`);
  }
};
