// Function to validate the contact form before submission
function validateForm() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    // Regular expression for validating email
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    // Validate name
    if (name === "") {
        alert("Please enter your name.");
        return false;
    }

    // Validate email
    if (email === "") {
        alert("Please enter your email.");
        return false;
    } else if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate message
    if (message === "") {
        alert("Please enter your message.");
        return false;
    }

    // If all fields are valid, allow form submission
    return true;
}
