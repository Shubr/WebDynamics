// Define an async function to handle logout
async function handleLogout(e) {
    e.preventDefault(); // Prevent the default behavoior of the link
    try {
        // Send POST request to /logout
        const response = await fetch('/logout', {
            method: "GET", // specify the method
        });

        // Check if the request was successful
        if(!response.ok) {
            console.error("Failed to log out: ", response.statusText);
            return;
        }

        const data = await response.json(); // Parse the response as JSON

        if(data.status === "success") {
            // Redirect to login page
            window.location.href = '/login';
        } else if (data.status === "error") {
            // Handle error
            console.error("Logout failed: ", data.message);
        }
    } catch (err) {
        // Handle fetch errors
        console.error("An error occurred while logging out: ", err);
    }
}

// Attach the event listener to the logout button
document.getElementById("logoutLink").addEventListener("click", handleLogout);
