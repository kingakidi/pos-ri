let tf = i("terminal-form");
let pn = i("platform-name");
let ti = i("terminal-id");
let ts = i("terminal-sn");
let pne = i("platform-name-error");
let tie = i("terminal-id-error");
let tse = i("terminal-form-error");

// let userid = "<?php echo $_SESSION['id']; ?>";
// console.log(userid);

// CHECK VALUE FUNCTION
function check(val) {
  return val.value.trim().length;
}
// CHECKING EMPTY ON KEYUP
[ti, ts].forEach(function (el) {
  el.onkeyup = function () {
    if (el.value.trim().length < 1) {
      i(`${el.id}-error`).innerHTML = "This field is required";
      i(`${el.id}-error`).style.visibility = "visible";
    } else {
      i(`${el.id}-error`).style.visibility = "hidden";
    }
  };
});

// CHECK AVAILABILITY ON BLUR
[ti, ts].forEach(function (el) {
  el.onblur = function () {
    // SEND AJAX
    if (el.value.trim() !== "") {
      let elAjax = new XMLHttpRequest();
      elAjax.onreadystatechange = function () {
        i(`${el.id}-error`).innerHTML = "CHECKING...";
        if (this.readyState == 4 && this.status == 200) {
          if (this.responseText == "SUCCESS") {
            i(`${el.id}-error`).innerHTML = "Redirecting...";
            i(`${el.id}-error`).innerHTML = this.responseText;
            i(`${el.id}-error`).style.visibility = "visible";
            window.location = "./dashboard/index.php";
          } else {
            i(`${el.id}-error`).innerHTML = this.responseText;
            i(`${el.id}-error`).style.visibility = "visible";
          }
        }
      };
      elAjax.open("POST", "./control/action.php", true);
      elAjax.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      elAjax.send(`el=${el.value}&${el.id}=1`);
    }
  };
});

// ON SUBMIT
tf.onsubmit = function (e) {
  e.preventDefault();

  // CHECK FOR ALL FIELD SELECTED

  if (check(ti) > 0 && check(ts) > 0 && check(pn) > 0) {
    tse.innerHTML = "<span class='text-info'>LOADING...</span>";
    tse.style.visibility = "visible";
    let stAjax = new XMLHttpRequest();
    stAjax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "TERMINAL UPLOADED SUCCESSFULLY") {
          tse.innerHTML = this.responseText;
          tse.style.visibility = "visible";
          tf.reset();
          tse.innerHTML = "";
        } else {
          tse.innerHTML = this.responseText;
          tse.style.visibility = "visible";
        }
      }
    };
    stAjax.open("POST", "./control/action.php", true);
    stAjax.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    stAjax.send(`pn=${pn.value}&ts=${ts.value}&ti=${ti.value}&addTerminal=1`);
  } else {
    tse.innerHTML = "ALL FIELD REQUIRED";
    tse.style.visibility = "visible";
  }
};
