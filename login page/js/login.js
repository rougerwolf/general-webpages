// Get the form element
var form = document.getElementById("login-form");

// Add a submit event listener to the form
form.addEventListener("submit", function (event) {
    event.preventDefault();

    // Get the form data
    var username = form.elements.username.value;
    var password = form.elements.password.value;

    // Send a request to the server to check the credentials
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "login.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            if (response === "success") {
                // The credentials are correct
                // Redirect the user to the dashboard
                window.location.href = "dashboard.html";
            } else {
                // The credentials are incorrect
                // Show an error message
                alert("Invalid username or password.");
            }
        }
    }
    xhr.send("username=" + username + "&password=" + password);
});
