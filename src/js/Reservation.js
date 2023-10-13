function calculerDifference() {
  let date1String = $("#date_debut").val();
  let date2String = $("#date_fin").val();
  let date1Parts = date1String.split("-");
  let date2Parts = date2String.split("-");
  let date_debut = new Date(date1Parts[2], date1Parts[1] - 1, date1Parts[0]);
  let date_fin = new Date(date2Parts[2], date2Parts[1] - 1, date2Parts[0]);
  let diff = date_fin - date_debut;
  let diffDay = diff / (1000 * 60 * 60 * 24);
  let night = diffDay > 1 ? " nuits" : " nuit";
  $("#number").text(diffDay + night);
  return diffDay;
}

function calculTotal(price) {
  const days = calculerDifference();
  let total = price * days;
  Math.round(total, 2);
  $(".total").html(total + " €");
  $("#price").val(total);
}

function createInput(price, title) {
  $("#price").val(price);
  $("#titles").val(title);
}

function estDivVisible() {
  var div = $(".content__info");
  var divTop = div.offset().top;
  var scrollTop = $(window).scrollTop();

  if (scrollTop >= divTop) {
    return true;
  } else {
    return false;
  }
}

$(window).scroll(function () {
  if (estDivVisible()) {
    $("#form").addClass("form__fixed");
  } else {
    $("#form").removeClass("form__fixed");
  }
});

$(document).ready(() => {});
