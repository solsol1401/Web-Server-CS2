// Offset for Site Navigation
// JavaScript code for the booking system

// Function to handle login form submission
document.getElementById("loginForm").addEventListener("submit", function(event) {
	event.preventDefault(); // Prevent form submission
  
	// Get the entered username and password
	var username = document.querySelector("input[name='username']").value;
	var password = document.querySelector("input[name='password']").value;
  
	// TODO: Send the username and password to the backend for authentication
	// You can use AJAX or fetch API to send a request to the server and handle the response
  
	// Example code for demonstration purposes
	// Simulating a successful login
	var user = {
	  username: "exampleUser",
	  name: "John Doe"
	};
  
	// Store user information in local storage for session management
	localStorage.setItem("user", JSON.stringify(user));
  
	// Redirect to the homepage or update the UI accordingly
	window.location.href = "homepage.html";
  });
  
  // Function to get the user information from local storage
  function getUser() {
	var user = localStorage.getItem("user");
	return user ? JSON.parse(user) : null;
  }
  
  // Function to display the cart items
  function displayCartItems() {
	var user = getUser();
	var cartItemsElement = document.getElementById("cartItems");
  
	if (user && user.cartItems && user.cartItems.length > 0) {
	  var cartItemsHTML = "";
  
	  // Generate HTML for each item in the cart
	  user.cartItems.forEach(function(item) {
		cartItemsHTML += "<p>" + item.name + "</p>";
	  });
  
	  cartItemsElement.innerHTML = cartItemsHTML;
	} else {
	  cartItemsElement.innerHTML = "<p>Your cart is empty.</p>";
	}
  }
  
  // Function to display the reservation details
  function displayReservationDetails() {
	var user = getUser();
	var reservationDetailsElement = document.getElementById("reservationDetails");
  
	if (user && user.reservation) {
	  var reservationHTML =
		"<p>Reservation ID: " + user.reservation.reservationId + "</p>" +
		"<p>Reserved Equipment: " + user.reservation.equipment + "</p>" +
		"<p>Rental Period: " + user.reservation.rentalPeriod + "</p>";
  
	  reservationDetailsElement.innerHTML = reservationHTML;
	} else {
	  reservationDetailsElement.innerHTML = "<p>No reservation found.</p>";
	}
  }
  
  // Call the functions to display cart items and reservation details
  displayCartItems();
  displayReservationDetails();
  