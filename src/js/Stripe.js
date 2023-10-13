window.onload = () => {
  let stripe = Stripe(
    "pk_test_51NiItcEulzwDXkR892rdv8Sz3BbZxi7HESLuwLjYCPfpFY6NUMYWHUIgg9EZGrBYptLX4hMNHOxxzXHX7PT7xoiC00wBw9SrIT"
  );
  let elements = stripe.elements();

  // DOM

  let cardHolderName = document.getElementById("cardholder-name");
  let cardButton = document.getElementById("card-button");
  let clientSecret = cardButton.dataset.secret;

  // GENERER FORMULAIRE
  let card = elements.create("card", {
    style: {
      base: {
        iconColor: "#fff",
        color: "white",
      },
    },
  });
  card.mount("#card-elements");

  card.addEventListener("change", (e) => {
    let displayError = document.getElementById("card-errors");
    if (e.error) {
      displayError.textContent = e.error.message;
    } else {
      displayError.textContent = "";
    }
  });

  cardButton.addEventListener("click", (e) => {
    e.preventDefault();
    stripe
      .handleCardPayment(clientSecret, card, {
        payment_method_data: {
          billing_details: { name: cardHolderName.value },
        },
      })
      .then((result) => {
        if (result.error) {
          document.getElementById("errors").innerText = result.error.message;
        } else {
          sendData(userID, reservationID, date_debut, date_fin);
        }
      });
  });
};

function sendData(userID, reservationID, date_debut, date_fin) {
  $.ajax({
    type: "POST",
    url: "../process/insertBook.php",
    data: {
      userID: userID,
      reservationID: reservationID,
      date_debut: date_debut,
      date_fin: date_fin,
    },
    dataType: "JSON",
    success: function (response) {
      if (response.action === "success") {
        console.log(response);
        $("#card-success").text(
          "Paiement réussi, enregistrement de votre réservation"
        );
      }
    },
    error: function (jqXHR) {
      console.log(jqXHR);
    },
  });
}
