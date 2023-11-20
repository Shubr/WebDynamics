// Initialise modal varibles
const modal = document.getElementById("editPlayerModal");
const closeButton = document.getElementsByClassName("close")[0];

// Functions for modla managment
function openModal(id, name, position) {
    document.getElementById("playerId").value = id;
    document.getElementById("playerName").value = name;
    document.getElementById("playerPostion").value = position;
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

function clickOutside(event) {
    if(event.target === modal) {
        closeModal();
    }
}

// Attach event listeners
closeButton.onclick = closeModal;
window.onclick = clickOutside;