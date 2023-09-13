async function fetchTeams(id) {
    const response = await fetch(`/teams/${id}`);
    const data = await response.json();
    await displayTeams(data)

}

async function displayTeams(data) {
    const teamsList = document.querySelector('.teams-menu');
    teamsList.innerHTML = ''; // Clear the list
    data.data.teams.forEach(team => {
        teamsList.insertAdjacentHTML(
            "afterbegin",
            `<li><a href="/team/${team.id}" onclick="event.preventDefault(); fetchPlayers(${team.id});">${team.team}</a></li>`
          );
    });
}

// Fetch teams on page load:
document.addEventListener("DOMContentLoaded", fetchTeams(1));