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
    <?php
        if($_COOKIE == true) {
            $isAuthenticated = true;
        }
        else {
            $isAuthenticated = false;
        }
    ?>
    <div class="container">
        <div class="top-nav">
            <h3 class="top-title">Rugby World Cup-2023</h3>
            <div class="nav-link">

                <?php if(!$isAuthenticated): ?>
                    <a id="logoutLink" href="/logout">Logout</a> 
                    <a  href="/dashboard">Dashboard</a>
                <?php else: ?>
                <a class="register" href="/register">Register</a>
                <a class="login" href="/login">Login</a>

                <?php endif; ?>
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


    <script src="/js/players.js"></script> <!-- Links the players java script to the html -->
    <script src="/js/teams.js"></script> <!-- Links the teams java script to the html -->
    <script src="/js/search.js"></script> <!-- Links the search java script to the html -->
    <script src="/js/logout.js"></script>
</body>

</html>