let pn = i("platform-name");
let pf = i("platform-form");
let ps = i("platform-submit");
let pe = i("platform-error");

pn.onkeyup = function () {
  if (pn.value.trim().length > 0) {
    pe.style.visibility = "hidden";
  } else {
    pe.innerHTML =
      "<span class='text-danger'>PLATFORM NAME IS REQUIERED</span>";
    pe.style.visibility = "visible";
  }
};

// SUBMIT
pf.onsubmit = function (e) {
  e.preventDefault();
  if (pn.value.trim().length > 0) {
    pe.style.visibility = "hidden";

    // SEND TO DATABASE
    let platformAjax = new XMLHttpRequest();
    platformAjax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "SUCCESS") {
          pe.innerHTML = "Redirecting...";
          pe.innerHTML = this.responseText;
          pe.style.visibility = "visible";
          window.location = "./dashboard/index.php";
        } else {
          pe.innerHTML = this.responseText;
          pe.style.visibility = "visible";
        }
      }
    };
    platformAjax.open("POST", "./control/action.php", true);
    platformAjax.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    platformAjax.send(`pn=${pn.value}&addPlatform=1`);
  } else {
    pe.innerHTML =
      "<span class='text-danger'>PLATFORM NAME IS REQUIERED</span>";
    pe.style.visibility = "visible";
  }
};
