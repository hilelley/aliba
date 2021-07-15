(function () {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
})();

jQuery(document).ready(function ($) {
  $(".carousel").carousel({
    interval: 3000,
  });
  $("#pulse").mouseover(function () {
    console.log("kjf");
    $(this).addClass("animate__animated animate__pulse animate__delay-0.1s");
  });

  $("#pulse").mouseleave(function () {
    setTimeout(() => {
      $(this).removeClass()(
        "animate__animated animate__pulse animate__delay-0.1s"
      );
    }, 50);
  });
});
