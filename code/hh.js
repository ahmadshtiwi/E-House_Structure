function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}
  

function liveSearch() {
  
  // get data from posts 
  let cards = document.querySelectorAll('.card');
  let card_price = document.querySelectorAll('.card #price');
  let card_area = document.querySelectorAll(".card #area");
  let card_room = document.querySelectorAll(".card #room");
  let card_bathroom = document.querySelectorAll(".card #bathroom");
  let card_balcony = document.querySelectorAll(".card #balcony");
  let card_garden = document.querySelectorAll(".card #garden");
  let card_city = document.querySelectorAll(".card #city");

  
  // get value from filter 
  let price = document.getElementById('price_id').value;
   let area = document.getElementById('area_id').value;
   let room = document.getElementById('room_id').value;
   let bathroom = document.getElementById('bathroom_id').value;
   let balcony = document.getElementById('balcony_id').value;
  let garden = document.getElementById('garden_id').value;
  let city = document.getElementById('city_id').value;




  // Loop through the cards
  for (var i = 0; i < cards.length; i++) {
    // If number less than ...
    // display items
    if (Number(card_price[i].innerText) >= Number(price)
    && Number(card_area[i].innerText) >= Number(area)
    && Number(card_room[i].innerText) >= Number(room)
    && Number(card_bathroom[i].innerText) >= Number(bathroom)
    && Number(card_garden[i].innerText) >= Number(garden)
      && Number(card_balcony[i].innerText) >= Number(balcony)
      && card_city[i].innerText== city) {
     
      // ...remove the `.is-hidden` class.
        cards[i].classList.remove("is-hidden");
    }
    else {
     
      // Otherwise, add the class.
      cards[i].classList.add("is-hidden");
    }
  }
}



