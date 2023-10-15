$("#burger__close").click(() => {
  $(".menu__all").css("display", "none");
  $("html, body").css({
    overflow: "auto",
    height: "auto",
  });
});

let isClick = false;

function displayMenu() {
  if (!isClick) {
    $(".menu__all").css("display", "flex");
    $("html, body").css({
      overflow: "hidden",
      height: "100%",
    });
  }
}
