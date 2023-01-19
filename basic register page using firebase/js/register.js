// Get the form element
var form = document.getElementById("register-form");

// Add a submit event listener to the form
form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Get the form data
    var email = form.elements.email.value;
    var password = form.elements.password.value;

    // Create a new user with Firebase
    firebase.auth().createUserWithEmailAndPassword(email, password)
        .then(function(response) {
            // The user is successfully registered
            // Show a message
            alert("Registration successful!");
        })
        .catch(function(error) {
            // An error occurred
            // Show an error message
            alert(error.message);
        });
});
