async function fetchTeams(id) {
    const response = await fetch(`/teams/${id}`);
    const data = await response.json();
    await displayTeams(data)
    await displayCoach(data)
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
async function displayCoach(data) {
    //  Your own code to go here
        const teamsList = document.querySelector('.coach-grid');
        teamsList.innerHTML = ''; // Clear the list
        // data.data.teams.forEach(team => {
        //     teamsList.insertAdjacentHTML(
        //         "afterbegin",
        //         `
        //         <div>
        //             <header class="${team.coach.toLowerCase()}">${team.coach}</header>
        //             <div class="img-div">
                        
        //             </div>
        //             <footer class="${team.coach.toLowerCase()}-bottom">Coach</footer>
        //         </div>
        //     `
        //     );
        // });
        teamsList.insertAdjacentHTML(
            "afterbegin",
            `
            <div>
                <header class="${data.data.coach}">${data.data.coach}</header>
                <div class="img-div">
                    
                </div>
                <footer class="${data.data.coach}-bottom">Coach</footer>
            </div>
        `
        );
    }
// Fetch teams on page load:
document.addEventListener("DOMContentLoaded", fetchTeams(1));