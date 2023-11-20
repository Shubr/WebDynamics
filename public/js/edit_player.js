async function updatePlayer(event) {
    event.preventDefault();

    try {
        const response = await fetch("/player/update", {
            method: "POST",
            body: new FormData(event.target)
        });

        const data = await response.json();

        if(response.ok && data.status === "success") {
            alert("Player updated!")
            await fetchPlayers(currentId);
            closeModal();
        } else {
            console.log("Update failed", data.message || `HTTP error: Status ${response.status}`);
        }
    }
    catch(error) {
        console.log("Update failed" , error.message);
    }
}

document.getElementById('editPlayerForm').addEventListener("submit", updatePlayer);