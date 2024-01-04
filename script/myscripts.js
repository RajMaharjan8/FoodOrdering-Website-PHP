// var price = document.getElementById("price").value;
// var myQuantity = document.getElementById("quantity").value;

document.getElementById("quantity").addEventListener("input", function () {
  var myQuantity = document.getElementById("quantity").value;
  var myPrice = document.getElementById("price").value;

  var calc = myQuantity * myPrice;
  console.log(myQuantity * myPrice);

  document.getElementById("total").innerHTML = "Rs. " + calc;
});
