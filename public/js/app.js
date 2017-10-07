$(document).foundation()
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
console.log(btn);
var span = document.getElementsByClassName("close")[0]; 
btn.onclick = function() {
    modal.style.display = "block";
}
close.onclick = function() {
    modal.style.display = "none";
}
close.onclick =
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}