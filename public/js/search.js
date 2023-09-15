async function filterByPlayer(id){
    const searchbox = document.getElementById('search-bar');
    const playername = searchbox.value;
    const responese = await fetch(`/players/filter/${playername}`)
    const data = await responese.json();
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    await displayPlayers(data)
}


async function filterByPosition(id){
    const searchbox = document.getElementById('position-select');
    const playername = searchbox.value;
    const responese = await fetch(`/players/filter/${playername}`)
    const data = await responese.json();
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    await displayPlayers(data)
}
