const rif = i("rif");
const ci11 = i("ci11");
const ci12 = i("ci12");
const ci21 = i("ci21");
const ci22 = i("ci22");
const ci31 = i("ci31");
const ci32 = i("ci32");
const ci33 = i("ci33");
let ciArray = [ci11, ci12, ci21, ci22, ci31, ci32, ci33];
const ciForm = i("in");
const coForm = i("out");
const totalCi = i("total-ci");
const roi = i("roi");
const totalSums = [345, 23];
let ei = i("error-in");

function getSum(arg) {
  return arg.reduce(function (a, b) {
    return a + b;
  }, 0);
}
// CHECK FORM INPUT
function check(x) {
  return x.value.trim().length;
}

function returnSum(arrays, showValues, fillIndex) {
  // let sumAns = [0, 2];
  arrays.forEach(function (element) {
    element.onkeyup = function calcShow() {
      let values = arrays.map((x) => Number(x.value));
      let sums = getSum(values);
      showValues.value = `${sums.toLocaleString()}`;
      fillIndex = sums;
    };
  });
}

if (ciArray !== null && totalCi !== null) {
  returnSum(ciArray, totalCi, totalSums[0]);

  ciForm.onsubmit = (e) => {
    e.preventDefault();
    if (
      check(ci11) > 0 &&
      check(ci12) > 0 &&
      check(ci21) > 0 &&
      check(ci22) > 0 &&
      check(ci31) > 0 &&
      check(ci32) > 0 &&
      check(ci33) > 0
    ) {
      ei.style.visibility = "hidden";

      // SEND CI AJAX
      let ciAjax = new XMLHttpRequest();
      let ciData = `ci11=${ci11.value}&ci12=${ci12.value}&ci21=${ci21.value}&ci22=${ci22.value}&ci31=${ci31.value}&ci32=${ci32.value}&ci33=${ci33.value}&totalCi=${totalCi.value}&ci=1`;
      ciAjax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          if (
            this.responseText ==
            "<span class='text-info'>CI UPDATED SUCCESSFULLY</span>"
          ) {
            ei.innerHTML = this.responseText;
            ei.style.visibility = "visible";
            ciForm.reset();
            location.reload();
          } else {
            ei.innerHTML = this.responseText;
            ei.style.visibility = "visible";
          }
        }
      };
      ciAjax.open("POST", "./control/action.php", true);
      ciAjax.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      ciAjax.send(ciData);
    } else {
      ei.style.visibility = "visible";
      ei.innerHTML = "<span  class='text-danger'>ALL FIELD REQUIRED</span>";
    }
  };
}

// BEGINNING OF CO OPERATIONS
// CO VARIABLES
const co11s = document.getElementsByClassName("co11");
const co12 = i("co12");
const co21 = i("co21");
const co22 = i("co22");
const co31 = i("co31");
const co32 = i("co32");
const tc01 = i("tc01");
const tc02 = i("tc02");
const cx = i("cx");
const totalCo = i("total-co");
let co11Array = [];
let coe = i("error-out");

// GET SUMS OF C(S)
// function getSum(total, num) {
//   return total + num;
// }
// ITERATE TERMINAL AND PUSH TO ARRAY CO
for (let i = 0; i < co11s.length; i++) {
  const element = co11s[i];
  co11Array.push(element);
}

let cos = [co12, co21, co22, co31, co32];
let coArray = co11Array.concat(cos);

// ARRAYS, SHOWING INPUTS, ARRAY INDEX TO FILLED

if (coArray !== null && totalCo !== null) {
  returnSum(coArray, totalCo, totalSums[1]);

  coForm.onsubmit = function (e) {
    e.preventDefault();
    // CREATE STRING FROM ARRAY OF MONEY PAYOUT (SINCE THE POS MIGHT BE MORE THAN WE HAVE TO USE LITTLE SENSE)
    let pmArray = co11Array.map(function (element) {
      return `${element.id}:${element.value}`;
    });
    pmData = pmArray.join("-");
    // console.log(pmData);

    // MONEY PAYOUT THROUGH POS ARRAY ( I TELL YOU )
    pmArrayValue = co11Array.map(function (element) {
      return `${element.value}`;
    });

    // CHECK FOR EMPTY FIELD
    if (
      check(co12) > 0 &&
      check(co21) > 0 &&
      check(co22) > 0 &&
      check(co31) > 0 &&
      check(co32) > 0 &&
      check(tc01) > 0 &&
      check(tc02) > 0 &&
      check(cx) &&
      !pmArrayValue.includes("")
    ) {
      // CO DATA TO SEND (DON'T BOTHER TO EDIT THIS POINT, WE WILL CROSS CHECK :()
      let coData = `co11=${pmData}&co12=${co12.value}&co21=${co21.value}&co22=${co22.value}&co31=${co31.value}&co32=${co32.value}&tc01=${tc01.value}&tc02=${tc02.value}&cx=${cx.value}&totalCo=${totalCo.value}&sendCo=1`;

      coe.innerHTML = "<span class='text-info'>GOOD TO GO</span>";
      coe.style.visibility = "visible";
      // SEND
      // SEND CI AJAX
      let coAjax = new XMLHttpRequest();
      coAjax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          if (
            this.responseText ===
            "<span class='text-info'>CO UPLOADED SUCCESSFULLY</span>"
          ) {
            coe.innerHTML = this.responseText;
            coe.style.visibility = "visible";
            coForm.reset();
            location.reload();
          } else {
            coe.innerHTML = this.responseText;
            coe.style.visibility = "visible";
          }
        }
      };
      coAjax.open("POST", "./control/action.php", true);
      coAjax.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      coAjax.send(coData);
    } else {
      coe.innerHTML = "<span class='text-danger'>ALL FIELD REQUIRED";
      coe.style.visibility = "visible";
    }
  };
}
