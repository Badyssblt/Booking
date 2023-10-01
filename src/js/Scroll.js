function isElementInViewport(el) {
  let rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

$(document).ready(function () {
  $(window).scroll(function () {
    $(".slide").each(function () {
      if (isElementInViewport(this)) {
        $(this).addClass("slideAnimation");
      }
    });
  });
});
