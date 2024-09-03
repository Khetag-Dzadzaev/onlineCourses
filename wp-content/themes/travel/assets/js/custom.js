jQuery(document).ready(function ($) {
  var btn = $("#button");

  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });
  btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      "300"
    );
  });

  $(window).on("load", function () {
    // Preloader
    $(".loader").fadeOut();
    $(".loader-mask").delay(350).fadeOut("slow");
  });

  //
  $(document).ready(function () {
    var owl = $(".banner-con .owl-carousel");
    owl.owlCarousel({
      margin: 70,
      nav: false,
      loop: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 4500,
      responsive: {
        0: {
          items: 1,
        },
        576: {
          items: 1,
        },
        768: {
          items: 1,
        },
        992: {
          items: 1,
        },
        1200: {
          items: 1,
        },
        1440: {
          items: 1,
        },
      },
    });
  });

  //
  $(document).ready(function () {
    var owl = $(".top-destinations-con .top-destination-con1 .owl-carousel");
    owl.owlCarousel({
      margin: 30,
      nav: true,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 4500,
      responsive: {
        0: {
          items: 1,
        },
        576: {
          items: 1,
        },
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1200: {
          items: 3,
        },
        1440: {
          items: 3,
        },
      },
    });
  });
  //
  $(document).ready(function () {
    var owl = $(".travel-tour-con .owl-carousel");
    owl.owlCarousel({
      margin: 30,
      nav: true,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 4500,
      responsive: {
        0: {
          items: 1,
        },
        576: {
          items: 1,
        },
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1200: {
          items: 3,
        },
        1440: {
          items: 3,
        },
      },
    });
  });
  //
  $(document).ready(function () {
    var owl = $(".review-testimonial-con .owl-carousel");
    owl.owlCarousel({
      margin: 30,
      nav: true,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayTimeout: 4500,
      responsive: {
        0: {
          items: 1,
        },
        576: {
          items: 1,
        },
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1200: {
          items: 3,
        },
        1440: {
          items: 3,
        },
      },
    });
  });

  $(document).ready(function () {
    var owl = $(".top-destinations-con .destination-con2 .owl-carousel");
    owl.owlCarousel({
      margin: 30,
      nav: true,
      loop: true,
      dots: false,
      autoplay: false,
      autoplayTimeout: 4500,
      responsive: {
        0: {
          items: 1,
        },
        576: {
          items: 1,
        },
        768: {
          items: 2,
        },
        992: {
          items: 3,
        },
        1200: {
          items: 3,
        },
        1440: {
          items: 3,
        },
      },
    });
  });
  // wow js
  new WOW().init();

  //
  function dynamicDropDown(listIndex) {
    document.getElementById("infants").length = 0;
    document.getElementById("children").length = 0;

    for (let i = 0; i < Number(listIndex) + 1; i++) {
      document.getElementById("infants").options[i] = new Option(
        i.toString(),
        i
      );
    }

    for (let i = 0; i < 9 - Number(listIndex) + 1; i++) {
      document.getElementById("children").options[i] = new Option(
        i.toString(),
        i
      );
    }
  }

  // Get the button
  var backButton = document.getElementById("back-to-top-btn");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      backButton.style.display = "block";
    } else {
      backButton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  backButton.addEventListener("click", function () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  });

  $(".quantity .btn").on("click", function () {
    if (document.querySelector('button[name="update_cart"]')) {
      document.querySelector('button[name="update_cart"]').disabled = false;
    }
    var button = $(this);
    var oldValue = button.parent().parent().find("input").val();
    if (button.hasClass("btn-plus")) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 0;
      }
    }
    button.parent().parent().find("input").val(newVal);
  });
});

function formSend(e) {
  var act = e.getAttribute("action");
  var url = "";

  for (var i = e.elements.length - 1; i >= 0; i--) {
    var name = e.elements[i].getAttribute("name");
    if (e.elements[i].type == "checkbox") {
      if (e.elements[i].checked) {
        url += name + "=" + e.elements[i].value + "&";
      }
    } else if (name) {
      url += name + "=" + e.elements[i].value + "&";
    }
  }
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState === 4) {
      if (request.status === 422) {
        e.querySelector(".response").innerHTML = request.response;
        let inputs = e.querySelectorAll("input, select, textarea");
        inputs.forEach((el) => {
          el.addEventListener("input", () => {
            el.removeAttribute("style");
            el.classList.remove("error");
          });
        });
        let errors = e
          .querySelector(".response")
          .querySelectorAll("[data-error]");
        errors.forEach((el) => {
          let dataAt = el.getAttribute("data-error");
          let input = e.querySelector(
            "input[name=" +
              dataAt +
              "], select[name=" +
              dataAt +
              "], textarea[name=" +
              dataAt +
              "]"
          );
          input.style.borderColor = "#da4c4c";
          input.classList.add("error");
          // console.log(input);
        });
      } else {
        e.querySelector(".response").innerHTML = request.response;
        e.reset();
        setTimeout(
          () =>
            e
              .querySelector(".response")
              .removeChild(e.querySelector(".response").firstChild),
          3000
        );
      }
    }
  };

  request.open("POST", act);

  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  request.send(url);

  return false;
}

window.addEventListener("DOMContentLoaded", () => {
  // Auth modal
  (() => {
    const modal = document.querySelector("[data-auth-modal]"),
      modalBackdrop = modal.querySelector("[data-auth-modal-backdrop]"),
      triggers = document.querySelectorAll("[data-auth-modal-trigger]");

    const modalControls = (() => {
      const isActive = () => {
        return modal.classList.contains("open");
      };

      const open = () => {
        modal.classList.add("open");
        document.body.style.overflow = "hidden";

        if (mobileCheck() === false) {
          document.body.style.paddingRight = "17px";
        }
      };

      const close = () => {
        modal.classList.remove("open");
        document.body.removeAttribute("style");
      };

      const toggle = () => {
        if (isActive()) {
          close();

          return;
        }

        open();
      };

      return { isActive, open, close, toggle };
    })();

    triggers.forEach((trigger) => {
      trigger.addEventListener("click", (e) => {
        e.preventDefault();

        modalControls.toggle();
      });
    });

    modalBackdrop.addEventListener("click", () => {
      modalControls.close();
    });
  })();

  // Password form groups
  (() => {
    const groups = document.querySelectorAll(".custom-form-group_password");

    groups.forEach((group) => {
      /** @type {HTMLInputElement} */
      const input = group.querySelector(".custom-form-group__input"),
        trigger = group.querySelector(".custom-form-group__trigger");

      const inputControls = (() => {
        const isPassword = () => {
          return input.type === "password";
        };

        const setText = () => {
          input.type = "text";

          trigger.classList.add("toggled");
        };

        const setPassword = () => {
          input.type = "password";

          trigger.classList.remove("toggled");
        };

        const toggle = () => {
          if (isPassword()) {
            setText();

            return;
          }

          setPassword();
        };

        return { isPassword, setText, setPassword, toggle };
      })();

      trigger.addEventListener("click", () => {
        inputControls.toggle();
      });
    });
  })();

  // Auth form
  (() => {
    /** @type {HTMLFormElement} */
    const form = document.querySelector(".auth-modal");

    if (!form) {
      return;
    }

    const responseNode = form.querySelector(".auth-modal__response");

    function createAlertNode() {
      const div = document.createElement("div");

      div.classList.add("alert");
      div.classList.add("alert-danger");

      return div;
    }

    let isPending = false;

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      if (isPending) {
        return;
      }

      isPending = true;

      responseNode.innerHTML = "";

      const formData = new FormData(form);

      formData.append("action", "signin");

      try {
        const response = await fetch("/wp-admin/admin-ajax.php", {
          method: "POST",
          body: formData,
        });

        const data = await response.json();

        if (!response.ok) {
          const alertNode = createAlertNode();

          alertNode.textContent = data.message ?? "";

          responseNode.append(alertNode);

          return;
        }

        window.location.reload();
      } catch (_) {
      } finally {
        isPending = false;
      }
    });
  })();
});

window.mobileCheck = function () {
  let check = false;
  (function (a) {
    if (
      /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(
        a
      ) ||
      /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
        a.substr(0, 4)
      )
    )
      check = true;
  })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
};
