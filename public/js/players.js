async function fetchPlayers(id) {
    const response = await fetch(`/players/${id}`);
    const data = await response.json();
    await displayPlayers(data)
    await displayCoach(data)
}

async function displayPlayers(data) {
    const playerGrid = document.querySelector('.player-grid');
    playerGrid.innerHTML = ''; // Clear the list
    data.data.players.forEach(player => {
        const cardHTML = 
        playerGrid.insertAdjacentHTML(
            "afterbegin",
            `
            <div>
                <header class="${player.team.toLowerCase()}">${player.name}</header>
                <div class="img-div">
                    <img src="/images/players/${player.team}/${player.image}" alt="Player Image">
                </div>
                <footer class="${player.team.toLowerCase()}-bottom">${player.position}</footer>
            </div>
        `
        );
    });
}
async function displayCoach(data) {
//  Your own code to go here
}

// Fetch players on page load:
document.addEventListener("DOMContentLoaded", fetchPlayers(1));