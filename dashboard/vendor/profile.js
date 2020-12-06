function i(i) {
  return document.getElementById(i);
}
function id(i) {
  return document.getElementById(i);
}
let surname = id("surname");
let othername = id("othername");
let dob = id("dob");
let gender = id("gender");
let address = id("address");
let country = id("country");
let state = id("state");
let lga = id("lga");
let branch = id("branch");
let puf = id("profile-update-form");
let pufe = id("error-puf");

let updates = [
  surname,
  othername,
  gender,
  address,
  country,
  state,
  lga,
  branch,
];

updates.forEach(function (el) {
  el.onkeyup = function () {
    el.value = toTitleCase(el.value);
  };
});

updates.forEach((el) => {
  el.onblur = function () {
    let elError = id(`error-${el.id}`);
    if (el.value.trim().length < 1) {
      elError.innerHTML = `<span class="text-danger"> ${el.id} is required </span>`;
      elError.style.visibility = "visible";
    } else {
      elError.style.visibility = "hidden";
    }
  };
});

// GENDER SELECT
// [state, lga, gender].forEach(function (el) {
gender.onchange = function () {
  let elError = id(`error-${gender.id}`);
  if (gender.value.trim().length < 1) {
    elError.innerHTML = `<span class="text-danger"> ${gender.id} is required </span>`;
    elError.style.visibility = "visible";
  } else {
    elError.style.visibility = "hidden";
  }
};
// });

puf.onsubmit = function (event) {
  event.preventDefault();
  updates.forEach(function (el) {
    let elError = document.getElementById(`error-${el.id}`);
    if (el.value.trim().length < 1) {
      elError.innerHTML = `<span class="text-danger"> ${el.id} is required </span>`;
      elError.style.visibility = "visible";
    } else {
      elError.style.visibility = "hidden";
    }
  });

  //   CHECK FOR EMPTY FIELD
  if (
    checkForm(surname) < 1 ||
    checkForm(othername) < 1 ||
    checkForm(dob) < 1 ||
    checkForm(gender) < 1 ||
    checkForm(address) < 1 ||
    checkForm(country) < 1 ||
    checkForm(state) < 1 ||
    checkForm(lga) < 1 ||
    checkForm(branch) < 1 ||
    lga.value === "Select LGA..."
  ) {
    pufe.innerHTML =
      " <span class='text-danger'> Form Error: Check fields </span>";
    pufe.style.visibility = "visible";
  } else if (lga.value === "Select LGA...") {
    id("error-lga").innerHTML =
      " <span class='text-danger'> Form Error: Check fields: LGA </span>";
    id("error-lga").style.visibility = "visible";
  } else {
    // CALL AJAX
    pufe.innerHTML = "<span class='text-info'>LOADING...</span>";
    pufe.style.visibility = "visible";
    // PUF DATA
    let pufData = `profileUpdate=1&surname=${surname.value}&othername=${othername.value}&dob=${dob.value}&gender=${gender.value}&address=${address.value}&country=${country.value}&state=${state.value}&lga=${lga.value}&branch=${branch.value}`;
    let puAjax = new XMLHttpRequest();
    puAjax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "UPDATED SUCCESSFULLY") {
          pufe.innerHTML = this.responseText;
          pufe.style.visibility = "visible";
          puf.reset();
        } else {
          pufe.innerHTML = this.responseText;
          pufe.style.visibility = "visible";
        }
      }
    };
    puAjax.open("POST", "./control/action.php", true);
    puAjax.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    // SEND AJAX
    puAjax.send(pufData);
  }
};
