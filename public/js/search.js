async function filterByPlayer(id){
    const searchbox = document.getElementById('search-bar');
    const playername = searchbox.value;
    const responese = await fetch(`/players/filter/${playername}`)
    const data = await responese.json();
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    await displayPlayers(data)
}


async function filterPosition(id){
    const selectbox = document.getElementById('position-select');
    const postion = selectbox.value;
    const responese = await fetch(`/players/filterByPosition/${postion}`)
    const data = await responese.json();
    const coachGrid = document.querySelector('.coach-grid');
    coachGrid.innerHTML = ''; // Clear the list
    await displayPlayers(data)
}
