async function filterPlayers(id) {
    const searchbox = document.getElementById("search-bar");
    const playername = searchbox.value;
    const response = await fetch(`/player/filter/${playername}`);
    const data = await response.json();
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    await displayPlayers(data)
}

async function filterPostion(id) {
    const selectbox = document.getElementById("position-select");
    const playerpostion = selectbox.value;
    const response = await fetch(`/player/filterByPosition/${playerpostion}`);
    const data = await response.json();
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    await displayPlayers(data)
}

