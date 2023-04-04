// Get the popup and button
var popup = document.getElementById("popup");
var popupButton = document.getElementById("popup-button");

// When the user clicks the button, show the popup
popupButton.onclick = function() {
  popup.style.display = "block";
}

// When the user clicks the close button, hide the popup
var closeButtons = document.getElementsByClassName("close");
for (var i = 0; i < closeButtons.length; i++) {
  closeButtons[i].onclick = function() {
    popup.style.display = "none";
  }
}

// When the user clicks anywhere outside of the popup, hide it
window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
  }
}




// Open popup
function openPopup(popupId) {
  document.getElementById(popupId).style.display = "block";
}

// Close popup
var closeButtons = document.getElementsByClassName("close");
for (var i = 0; i < closeButtons.length; i++) {
  closeButtons[i].onclick = function() {
    var popup = this.parentElement.parentElement;
    popup.style.display = "none";
  }
}

// Close popup when clicking outside of it
window.onclick = function(event) {
  var popups = document.getElementsByClassName("popup");
  for (var i = 0; i < popups.length; i++) {
    if (event.target == popups[i]) {
      popups[i].style.display = "none";
    }
  }
}