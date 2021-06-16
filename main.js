function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
function schimbaVersiunea() {
  var x = document.getElementById("118932");
  x.action = "editdelete.php";
}

function schimbaVersiunea1(){
  var x = document.getElementById("118932");
  x.action = "";
}