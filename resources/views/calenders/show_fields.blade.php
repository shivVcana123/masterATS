var totalPriceElement = document.getElementById('totalPrice');
var subTotalPriceAmountElement = document.getElementById('subTotalPriceAmount');

function changePackSize(select) {
  // Set the value of the 'quantity' input to the default value of the select
 var defaultOptionValue = 1;
  $('#quantity').val(defaultOptionValue);
  
    var selectedOption = select.options[select.selectedIndex];
    var priceInput = document.getElementById('price');

    // Ensure that the data-value attribute is set and is a valid number
    var dataValue = selectedOption.getAttribute('data-value');
    if (!isNaN(parseFloat(dataValue))) {
        priceInput.value = parseFloat(dataValue).toFixed(2);
        totalPriceElement.textContent = priceInput.value; // Update the total price element
    } else {
        // Handle the case where data-value is not a valid number
        console.error("Invalid data-value attribute:", dataValue);
        return;
    }

    // Update total price based on the new pack size and quantity
    updateTotalPrice();

    // Show the dataValue below the totalPriceElement
    console.log("Data Value:", dataValue);
    
    // Convert dataValue to a number before using toFixed
    totalPriceElement.textContent = parseFloat(dataValue).toFixed(2);
     subTotalPriceAmountElement.textContent = parseFloat(dataValue).toFixed(2);
}


    function addQuantity(input) {
        // Get the current quantity value
        var quantityInput = parseInt(input.value);
    
        // Check if the 'up arrow' or 'down arrow' key is pressed
        if (event.keyCode === 38) {  // 'up arrow' key
            quantityInput++;
        } else if (event.keyCode === 40) {  // 'down arrow' key
            quantityInput = Math.max(1, quantityInput - 1);
        }
    
        // Update the quantity input value
        input.value = quantityInput;
    
        // Update total price based on the new quantity
        updateTotalPrice(quantityInput);
    }

var amount = 0;
function updateTotalPrice(quantityInput) {
    var priceInput = document.getElementById('price');
    // var totalPriceElement = document.getElementById('totalPrice'); // Assuming you have an element to display total price

    // Ensure that quantityInput is a number
    quantityInput = parseFloat(quantityInput);

    // Calculate total price
    amount = quantityInput * parseFloat(priceInput.value);

    // Update the total price element
    totalPriceElement.textContent = amount.toFixed(2); // Display total price with two decimal places
    //  subTotalPriceAmountElement.textContent = parseFloat(totalPrice).toFixed(2);
    TotalAmount();
}



    var totalAmount = 0;
 // Get the checkbox elements and table body

document.addEventListener('DOMContentLoaded', function () {
    var checkboxes = document.querySelectorAll('#allProducts input[type="checkbox"]');
    var tableBody = document.getElementById('table_body');
    var totalPriceAmount = document.getElementById('totalPriceAmount');
   
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            tableBody.innerHTML = ''; // Clear the existing table body content
            totalPriceAmount.textContent = ''; // Clear the existing total price content

            totalAmount = 0; // Reset totalAmount when checkboxes change

            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    var newRow = tableBody.insertRow();
                    var valueCell = newRow.insertCell(0);
                    var textCell = newRow.insertCell(1);
                    var quantityCell = newRow.insertCell(2);
                    var priceCell = newRow.insertCell(3);

                    valueCell.textContent = checkbox.value;
                    textCell.textContent = checkbox.parentElement.innerText.trim();
                    var initialPrice = parseFloat(checkbox.getAttribute('data-price'));

                    var quantityInput = document.createElement('input');
                    quantityInput.type = 'number';
                    quantityInput.value = '1';
                    quantityInput.name = 'quantity';
                    quantityCell.appendChild(quantityInput);

                    var priceInput = document.createElement('input');
                    priceInput.type = 'text';
                    priceInput.value = initialPrice.toFixed(2);
                    priceInput.name = 'price';
                    priceInput.readOnly = true; // Set as readOnly
                    priceCell.appendChild(priceInput);

                    quantityInput.addEventListener('input', function () {
                        var quantityValue = parseInt(quantityInput.value);
                        if (isNaN(quantityValue) || quantityValue < 1) {
                            quantityInput.value = '1';
                            quantityValue = 1;
                        }

                        var totalPrice= quantityValue * parseFloat(initialPrice);

                        // Subtract the previous contribution for this item and add the new one
                        totalAmount = totalAmount - parseFloat(priceInput.value) + totalPrice;

                        priceInput.value = totalPrice.toFixed(2);
                        updateTotalAmount();
                    });

                    totalAmount += initialPrice;
                }
            });

            updateTotalAmount();
        });
    });

    function updateTotalAmount() {
        // Update the total price content using the <span> in the <p> tag
        totalPriceAmount.textContent = totalAmount.toFixed(2);
        TotalAmount();
    }
});
function TotalAmount() {
    var totalPrice = document.getElementById('totalPrice').innerHTML;
    var totalPriceAmount = document.getElementById('totalPriceAmount').innerHTML;
// alert(totalPriceAmount);
    // Convert the string values to numbers
    var totalPriceValue = parseFloat(totalPrice.replace(',', '')); // Remove commas if present
    var totalPriceAmountValue = parseFloat(totalPriceAmount.replace(',', '')); // Remove commas if present
    
    if(totalPriceAmount == ''){
         var subTotalPriceAmount = totalPriceValue;
    }else{
         var subTotalPriceAmount = totalPriceValue + totalPriceAmountValue;
    }

    // Perform addition
   
     subTotalPriceAmountElement.textContent = parseFloat(subTotalPriceAmount).toFixed(2);
    console.log(subTotalPriceAmount);
}