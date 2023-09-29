function calculerDifference() {
  var date1String = $("#date_debut").val();
  var date2String = $("#date_fin").val();

  var date1 = new Date(date1String);
  var date2 = new Date(date2String);

  var differenceEnMilliseconds = date2 - date1;
  var differenceEnJours = differenceEnMilliseconds / (1000 * 60 * 60 * 24);
  differenceEnJours = Math.round(differenceEnJours);

  $("#number").text(differenceEnJours);
}

function calculTotal() {
  let price = $(".price").html();
  let day = $("#number").html();
  let total = price * day;
  $(".total").html(total + " €");
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

$(document).ready(() => {
  const today = new Date();
  const debut = today.toISOString().slice(0, 10);
  $("#date_debut").val(debut);
  const end = new Date();
  end.setDate(end.getDate() + 2);
  const endFormat = end.toISOString().slice(0, 10);
  $("#date_fin").val(endFormat);
  calculerDifference();
});

$("#date_debut, #date_fin").on("change", calculerDifference, calculTotal);
