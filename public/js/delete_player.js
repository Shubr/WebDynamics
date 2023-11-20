function confirmDelete(element) {
    const userConfirmed = window.confirm("Are you sure you want to delete this player?");

    if(userConfirmed) {
        const playerId = element.getAttribute("data-id");
        deletePlayer(playerId);
    }
}

async function deletePlayer(playerId) {
    try {
            const response = await fetch(`/player/${playerId}/delete`, {
                method: "POST",
                headers: {
                    "Accept": "application/json"
                }
            });

            if(response.ok) {
                alert("Player deleted!");
                await fetchPlayers(currentId);
            } else {
                console.error("Failed to delete player");
            }
        } catch(error) {
            console.error("Error during player deletion", error)
        }
}