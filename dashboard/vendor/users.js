let usersLink = document.querySelectorAll(".users-link");
let sud = i("show-userData");

usersLink.forEach(function (link) {
  link.onclick = function (e) {
    e.preventDefault();
    let data = `username${link.href.split("view")[1]}&fetchSingleUser=1`;
    // SEND AJAX
    let viewUserAjax = new XMLHttpRequest();
    viewUserAjax.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        i("popup-page").style.display = "block";
        i("popup-content").innerHTML = this.responseText;
        i("popup-close").onclick = function () {
          i("popup-page").style.display = "none";
        };

        window.onclick = function (e) {
          if (e.target === i("popup-page")) {
            i("popup-page").style.display = "none";
          } else {
            return false;
          }
        };
      }
    };
    viewUserAjax.open("POST", "./control/action.php", true);
    viewUserAjax.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    viewUserAjax.send(data);
  };
});
