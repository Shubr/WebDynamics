let currentId;

async function fetchPlayers(id) {
    currentId = id;
    const response = await fetch(`/players/${currentId}`);
    const data = await response.json();
    await displayPlayers(data);
    await displayCoach(data);
}

async function displayPlayers(data) {
    const playerGrid = document.querySelector('.player-grid');
    playerGrid.innerHTML = ''; // Clear the list
    data.data.players.forEach(player => {
        const card = document.createElement('div');
        card.innerHTML =  `
            <div class="player-container">
                <header id="player-header" class="${player.team.toLowerCase()}">${player.name}</header>
                <div class="img-div">
                    <img src="/images/players/${player.team}/${player.image}" alt="Player Image">
                </div>
                <footer id="playerFooter-Crud" class="${player.team.toLowerCase()}-bottom">      
                    <i class="fas fa-edit"></i> 
                    ${player.position} 
                    <i class="fas fa-trash" data-id=${player.id} onclick="confirmDelete(this)"></i> 
                </footer>
            </div>
        `;
        card.querySelector(".fa-edit").addEventListener("click", () => openModal(player.id, player.name, player.position));
        playerGrid.appendChild(card);
    });
    
}



async function displayCoach(data) {
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    
    const player = data.data.players[0]; // Get the first player

        const cardHTML = 
        coachGrid.insertAdjacentHTML(
            "afterbegin",
            `
            <div class="coach-container">
                <header id="coach-header" class="${player.team.toLowerCase()}">${player.coach}</header>
                <div class="img-div">
                        <img src="/images/coaches/${player.coach}.png" alt="Player Image">
                </div>
                <footer id="coach-footer" class="${player.team.toLowerCase()}-bottom">Coach</footer>
            </div>
            `       
        );   
}

// Fetch players on page load:
document.addEventListener("DOMContentLoaded", fetchPlayers(1));