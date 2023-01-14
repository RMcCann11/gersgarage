// Please note this function has been taken from the following source:

// Code-boxx. (2022) ‘Simple Appointment Booking With PHP MySQL (Free Download)’, code-boxx, 27 September 2022. Available at: https://code-boxx.com/appointment-booking-php-mysql [Accessed 06 December 2022] 

function select(cell, date, slot) {

  // (A) UPDATE SELECTED CELL
  let last = document.querySelector("#select .selected");

  if (last != null) { last.classList.remove("selected"); }
  cell.classList.add("selected");

  // (B) UPDATE CONFIRM FORM
  document.getElementById("cdate").value = date;
  document.getElementById("cslot").value = slot;
  document.getElementById("cgo").disabled = false;
  
}