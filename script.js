function showDetails(movie)
    {
        currentMovie = movie;
        let details= "";
            if(movie==="Loot"){
                details="Genre:Action<br>Showtime:10:00AM<br>Price:Rs.150";
        }
         else if(movie==="Bahubali: The Beginning"){
                details="Genre:Action<br>Showtime:11:00AM<br>Price:Rs.200";
        }
         else if(movie==="Avengers: Endgame"){
                details="Genre:Action<br>Showtime:12:00AM<br>Price:Rs.250";
        }
        else if(movie==="Chakka Panja"){
                details="Genre:Comedy<br>Showtime:01:00PM<br>Price:Rs.150";
        }
         else if(movie==="Hera Pheri"){
                details="Genre:Comedy<br>Showtime:02:00PM<br>Price:Rs.200";
        }
         else if(movie==="Home Alone"){
                details="Genre:Comedy<br>Showtime:03:00PM<br>Price:Rs.250";
        }
         else if(movie==="Pashupati Prasad"){
                details="Genre:Drama<br>Showtime:8:00AM<br>Price:Rs.150";
        }
         else if(movie==="3 Idiots"){
                details="Genre:Drama<br>Showtime:9:00AM<br>Price:Rs.200";
        }
         else if(movie==="The Pursuit of Happyness"){
                details="Genre:Drama<br>Showtime:04:00PM<br>Price:Rs.250";
        }

         else if(movie==="Boksi ko Ghar"){
                details="Genre:Horror<br>Showtime:06:00PM<br>Price:Rs.150";
        }
         else if(movie==="Bhool Bhulaiyaa"){
                details="Genre:Horror<br>Showtime:07:00PM<br>Price:Rs.200";
        }
        else if(movie==="The Conjuring"){
                details="Genre:Horror<br>Showtime:09:00PM<br>Price:Rs.250";
        }
        else if(movie==="2012"){
                details="Genre:Sci-Fi<br>Showtime:04:00PM<br>Price:Rs.250";
        }
        else if(movie==="Koi... Mil Gaya"){
                details="Genre:Sci-Fi<br>Showtime:05:00PM<br>Price:Rs.200";
        }
        else if(movie==="World War Z"){
                details="Genre:Sci-Fi<br>Showtime:08:00PM<br>Price:Rs.250";
        }
        document.getElementById("popup-title").innerHTML=movie;
        document.getElementById("popup-details").innerHTML=details;
        document.getElementById("popup").style.display="block";
        document.getElementById("seat-selection").style.display = "block";
    }
    function closePopup(){
    document.getElementById("popup").style.display = "none";
    document.getElementById("seat-selection").style.display = "none";
}
let currentMovie = "";
function bookTicket(){
        if(selectedSeats.length === 0){
    alert("Please select at least one seat");
    return;
}
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "booking.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function() {
        alert(this.responseText);
    };

    xhr.send(
        "movie=" + encodeURIComponent(currentMovie) +
        "&seats=" + encodeURIComponent(selectedSeats.join(","))
    );
}
let selectedSeats = [];

function selectSeat(seat){
    let seatNumber = seat.innerHTML;

    if(selectedSeats.includes(seatNumber)){
        selectedSeats = selectedSeats.filter(s => s !== seatNumber);
        seat.style.backgroundColor = "";
    } else {
        selectedSeats.push(seatNumber);
        seat.style.backgroundColor = "green";
    }
}
        function filterMovies() {
    let search = document.getElementById("searchBox").value.toLowerCase();
    let genre = document.getElementById("genreFilter").value.toLowerCase();

    let movies = document.getElementsByClassName("movie-item");

    for (let i = 0; i < movies.length; i++) {
        let title = movies[i].getAttribute("data-title").toLowerCase();
        let movieGenre = movies[i].getAttribute("data-genre").toLowerCase();

        let matchSearch = title.includes(search);
        let matchGenre = genre === "" || movieGenre === genre.toLowerCase();

        if (matchSearch && matchGenre) {
            movies[i].style.display = "";
        } else {
            movies[i].style.display = "none";
        }
    }
}