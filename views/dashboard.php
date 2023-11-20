<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rugby World Cup - 2023</title>
    <link rel="stylesheet" href="/css/main_styles.css">
    <link rel="stylesheet" href="/css/team-color.css"> 
</head>
<body>
    <div class="overlay"></div>
    
    <div class="container">
        <div class="top-nav_">
            <h3 class="top-title">Rugby World Cup-2023</h3>
            <div class="nav-link">
                <a class="register" href="/register">Register</a>
                <a id="logoutLink" href="/logout">Logout</a> 
            </div>

        </div>
        <div class="image-header">
            <h1>Rugby World Cup - France 2023</h1>
        </div>

        <div class="filter-section">
            <div class="search-box">
                <input id="search-bar" type="text">
                <button id="search-button" onclick="filterByPlayer()">Go</button>
            </div>
            <div class="position-box">
                <select id="position-select" onclick="filterPosition()">
                    <option value="" selected disabled>Position</option>
                    <option value="First-five">First-five</option>
                    <option value="Center">Center</option>
                    <option value="Flanker(6)">Flaker(6)</option>
                    <option value="Flanker(7)">Flaker(7)</option>
                    <option value="Flanker(8)">Flaker(8)</option>
                    <option value="Fullback">Fullback</option>
                    <option value="Halfback">Halfback</option>
                    <option value="Hooker">Hooker</option>
                    <option value="Lock">Lock</option>
                    <option value="Loosehead-Prop">Loosehead-Prop</option>
                    <option value="Second-five">Second-five</option>
                    <option value="Tighthead-Prop">Tighthead-Prop</option>
                    <option value="Wing">Wing</option>
                </select>
            </div>
        </div>

        <div class="main">
            <div class="sidebar-menu">
                <div class="sidebar-menu-header">Teams
                </div>
                <div class="sidebar-menu-main">
                    <ul class="teams-menu">
                    </ul>
                </div>
                <div class="sidebar-menu-footer"></div>
            </div>
            <div class="player-grid">
            </div>
            <div class="coach-grid">

            </div>
        </div>
        <div class="footer">
            <h3 class="footer-title">Created by Shubham Rangra</h3>
        </div>
    </div>

    </div>
    
    <script src="/js/dashboard.js"></script> 
    <script src="/js/teams.js"></script> 
    <script src="/js/search.js"></script> 
    <script src="/js/modal.js"></script> 
    <script src="/js/edit_player.js"></script> 
    <script src="/js/delete_player.js"></script> 
    <script src="/js/logout.js"></script> 
    <script src="https://kit.fontawesome.com/6752b02a43.js" crossorigin="anonymous"></script>
</body>

<div id="editPlayerModal" class="modal">
        <div class="modal-content">

            <header>
                <h2 class="edit-heading">Edit Player</h2>
                <i class="fa fa-times close" aria-hidden="true"></i>

            </header>
            <form id="editPlayerForm">
                <input type="hidden" id="playerId" name="id">
                <div class="playerNameContainer">
                    <label for="playerName">Name:</label>
                    <input type="text" id="playerName" name="name">
                </div>

                <div class="playerPostionContainer">
                    <label for="playerPostion">Postion:</label>
                    <input type="text" id="playerPostion" name="position">
                </div>
                <button class="update-btn"type="submit">Update</button>
            </form>
        </div>
</html>