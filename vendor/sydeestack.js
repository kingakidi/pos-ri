function i(i) {
  return document.getElementById(i);
}

function c(c) {
  return document.getElementsByClassName(i);
}

// CHECK VALID FORM
function checkForm(val) {
  return val.value.trim().length;
}

// STRING  TO TITLE CASE

function toTitleCase(str) {
  return str
    .split(/\s+/)
    .map((s) => s.charAt(0).toUpperCase() + s.substring(1).toLowerCase())
    .join(" ");
}
// CHECK NUMBER IN USERNAME
function isNumber(n) {
  return /^-?[\d.]+(?:e-?\d+)?$/.test(n);
}
// HAS WHITE SPACE
function hasWhiteSpace(s) {
  return /\s/g.test(s);
}

// EMAIL VALIDATION
function validateEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

// POPUP CLOSING
i("popup-close").onclick = function () {
  i("popup-page").style.display = "none";
};
