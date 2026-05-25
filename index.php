<?php
include"db.php";
$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topbar">
        <div class="left">
        <a href="login.php">Login</a><br><br>
        <a href="signup.php">Sign-up</a><br><br>
        </div>
        <div class="right">
    <input type="text" id="searchBox" placeholder="Search movies..." onkeyup="filterMovies()">
    <select id="genreFilter" onchange="filterMovies()">
                <option value="all">All</option>
                <option value="Action">Action</option>
                <option value="Comedy">Comedy</option>
                <option value="Drama">Drama</option>
                <option value="Horror">Horror</option>
                <option value="Sci-Fi">Sci-Fi</option>
            </select>
        </div>
    </div>
    <h1>
        Welcome to Cine-Hub🎬
</h1>
<h2>
    <div class="quote">
        Cinema is the most beautiful fraud in the world.
</div>
</h2>
    <div class="movies">
        <div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2 id="popup-title"></h2>
        <p id="popup-details"></p>

        <div id="seat-selection" style="display:none;">
            <h3>Select Seats</h3>

            <table class="seat-table">
                <tr>
                    <td onclick="selectSeat(this)">A1</td>
                    <td onclick="selectSeat(this)">A2</td>
                    <td onclick="selectSeat(this)">A3</td>
                    <td onclick="selectSeat(this)">A4</td>
                </tr>
                <tr>
                    <td onclick="selectSeat(this)">B1</td>
                    <td onclick="selectSeat(this)">B2</td>
                    <td onclick="selectSeat(this)">B3</td>
                    <td onclick="selectSeat(this)">B4</td>
                </tr>
            </table>

            <button onclick="bookTicket()">Confirm Booking</button>
        </div>
    </div>
</div>
       <table class="movie-table">
    <tr>
        <td class="movie-item" data-title="Loot" data-genre="Action" onclick="showDetails('Loot')">
            <p class="p">Loot</p>
            <img src="loot.jpg">
        </td>

        <td class="movie-item" data-title="Bahubali: The Beginning" data-genre="Action" onclick="showDetails('Bahubali: The Beginning')">
            <p class="p">Bahubali: The Beginning</p>
            <img src="bahubali.jpg">
        </td>

        <td class="movie-item" data-title="Avengers: Endgame" data-genre="Action" onclick="showDetails('Avengers: Endgame')">
            <p class="p">Avengers: Endgame</p>
            <img src="Avengers.jpg">
        </td>
    </tr>

    <tr>
        <td class="movie-item" data-title="Chakka Panja" data-genre="Comedy" onclick="showDetails('Chakka Panja')">
            <p class="p">Chakka Panja</p>
            <img src="ChakkaPanja.jpg">
        </td>

        <td class="movie-item" data-title="Hera Pheri" data-genre="Comedy" onclick="showDetails('Hera Pheri')">
            <p class="p">Hera Pheri</p>
            <img src="HeraPheri.jpg">
        </td>

        <td class="movie-item" data-title="Home Alone" data-genre="Comedy" onclick="showDetails('Home Alone')">
            <p class="p">Home Alone</p>
            <img src="HomeAlone.jpg">
        </td>
    </tr>

    <tr>
        <td class="movie-item" data-title="Pashupati Prasad" data-genre="Drama" onclick="showDetails('Pashupati Prasad')">
            <p class="p">Pashupati Prasad</p>
            <img src="Pashupati_Prasad.jpg">
        </td>

        <td class="movie-item" data-title="3 Idiots" data-genre="comedy" onclick="showDetails('3 Idiots')">
            <p class="p">3 Idiots</p>
            <img src="3Idiots.jpg">
        </td>

        <td class="movie-item" data-title="The Pursuit of Happyness" data-genre="Drama" onclick="showDetails('The Pursuit of Happyness')">
            <p class="p">The Pursuit of Happyness</p>
            <img src="ThePursuitOfHappyness.jpg">
        </td>
    </tr>

    <tr>
        <td class="movie-item" data-title="Boksi ko Ghar" data-genre="Drama" onclick="showDetails('Boksi ko Ghar')">
            <p class="p">Boksi ko Ghar</p>
            <img src="Boksiko_ghar.jpg">
        </td>

        <td class="movie-item" data-title="Bhool Bhulaiyaa" data-genre="Horror" onclick="showDetails('Bhool Bhulaiyaa')">
            <p class="p">Bhool Bhulaiyaa</p>
            <img src="Bhool_bhulaiyaa.jpg">
        </td>

        <td class="movie-item" data-title="The Conjuring" data-genre="Horror" onclick="showDetails('The Conjuring')">
            <p class="p">The Conjuring</p>
            <img src="TheConjuring.jpg">
        </td>
    </tr>

    <tr>
        <td class="movie-item" data-title="2012" data-genre="Sci-Fi" onclick="showDetails('2012')">
            <p class="p">2012</p>
            <img src="2012.jpg">
        </td>

        <td class="movie-item" data-title="Koi... Mil Gaya" data-genre="Sci-Fi" onclick="showDetails('Koi... Mil Gaya')">
            <p class="p">Koi... Mil Gaya</p>
            <img src="KoiMilGaya.jpg">
        </td>

        <td class="movie-item" data-title="World War Z" data-genre="Action" onclick="showDetails('World War Z')">
            <p class="p">World War Z</p>
            <img src="WorldWarZ.jpg">
        </td>
    </tr>
</table>
    </div> 
    <div id="details"></div>
    <script src="script.js"></script>
    <a href="mybooking.php">My Bookings</a>
    <a href="logout.php">Logout</a>
</body>
</html>