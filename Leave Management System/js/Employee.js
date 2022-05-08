var Expando1 = document.getElementById("Expando1");

Expando1.style.display = "none";


function toggle_visibility() {
    if (Expando1.style.display == 'none'){
        Expando1.style.display = 'block';
        document.getElementById("toggle_visibility").style.backgroundColor = "#f7f7f7";
        document.getElementById("toggle_visibility").style.height = "150px";
        document.getElementById("list").style.transform = "rotate(90deg)";
        document.getElementById("list").style.transition = "0.3s all ease";
    }
    else{
        Expando1.style.display = 'none';
        document.getElementById("toggle_visibility").style.backgroundColor = "transparent";
        document.getElementById("toggle_visibility").style.height = "60px";
        document.getElementById("list").style.transform = "rotate(0deg)";
        document.getElementById("list").style.transition = "0.3s all ease";
    }
}
