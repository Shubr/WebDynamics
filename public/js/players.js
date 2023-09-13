async function fetchPlayers(id) {
    const response = await fetch(`/players/${id}`);
    const data = await response.json();
    await displayPlayers(data)
    await getVal(data)

    
}

async function displayPlayers(data) {
    const playerGrid = document.querySelector('.player-grid');
    playerGrid.innerHTML = ''; // Clear the list
    data.data.players.forEach(player => {
        const cardHTML = 
        playerGrid.insertAdjacentHTML(
            "afterbegin",
            `
            <div class=player-card>
                <header class="${player.team.toLowerCase()}">${player.name}</header>
                <div class="img-div">
                    <img src="/images/players/${player.team}/${player.image}" alt="Player Image">
                </div>
                <footer class="${player.team.toLowerCase()}-bottom">${player.position}</footer>
            </div>
        `
        );
    });
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    coachGrid.insertAdjacentHTML(
        "afterbegin",
        `
        <div class=coach-card>
            <header class="${data.data.players[0].team.toLowerCase()}">${data.data.players[0].coach}</header>
            <div class="img-div">
                <img src="/images/coaches/${data.data.players[0].coach}.png" alt="Player Image">
            </div>
            <footer class="${data.data.players[0].team.toLowerCase()}-bottom">Coach</footer>
        </div>
    `
    );
}
async function filterByPlayer(data){
    const playerGrid = document.querySelector('.player-grid');
    playerGrid.innerHTML = ''; // Clear the list
    data.data.players.forEach(player => {
        const cardHTML = 
        playerGrid.insertAdjacentHTML(
            "afterbegin",
            `
            <div class=player-card>
                <header class="${player.team.toLowerCase()}">${player.team}</header>
            </div>

        `
        );
    });
}



// Fetch players on page load:
document.addEventListener("DOMContentLoaded", fetchPlayers(1));