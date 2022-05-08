var page1 = document.getElementById("page1");
var page1_view_details = document.getElementById("page1_view_details");
var page1_take_action = document.getElementById("page1_take_action");
var page3 = document.getElementById("page3");
var Expando1 = document.getElementById("Expando1");
var Expando2 = document.getElementById("Expando2");

document.getElementById('l').style.display = 'none';

function myFunction1_view_details() {
    if (page1_view_details.style.display == "none") {
        page1_view_details.style.display = "block";
    } else {
        page1_view_details.style.display = "block";
        document.getElementById("l").style.display = "none";
    }
}

function myFunction1_take_action() {
    if (document.getElementById('l').style.display == "none") {
        page1_view_details.style.display = "block";
        document.getElementById('l').style.display = 'block';
    } else {
        document.getElementById("l").style.display = "none";
    }
}


function toggle_visibility1() {
    if (Expando1.style.display == 'none'){
        Expando1.style.display = 'block';
        document.getElementById("toggle_visibility1").style.backgroundColor = "white";
        document.getElementById("toggle_visibility1").style.height = "110px";
        document.getElementById("i_ADD_EMPLOYEE").style.transform = "rotate(90deg)";
        document.getElementById("i_ADD_EMPLOYEE").style.transition = "0.3s all ease";
    }
    else{
        Expando1.style.display = 'none';
        document.getElementById("toggle_visibility1").style.backgroundColor = "transparent";
        document.getElementById("toggle_visibility1").style.height = "40px";
        document.getElementById("i_ADD_EMPLOYEE").style.transform = "rotate(0deg)";
        document.getElementById("i_ADD_EMPLOYEE").style.transition = "0.3s all ease";
    }
}

function toggle_visibility2() {
    if (Expando2.style.display == 'none'){
        Expando2.style.display = 'block';
        document.getElementById("toggle_visibility2").style.backgroundColor = "white";
        document.getElementById("toggle_visibility2").style.height = "75px";
        document.getElementById("i_ADD_EMPLOYEE2").style.transform = "rotate(90deg)";
        document.getElementById("i_ADD_EMPLOYEE2").style.transition = "0.3s all ease";
    }
    else{
        Expando2.style.display = 'none';
        document.getElementById("toggle_visibility2").style.backgroundColor = "transparent";
        document.getElementById("toggle_visibility2").style.height = "40px";
        document.getElementById("i_ADD_EMPLOYEE2").style.transform = "rotate(0deg)";
        document.getElementById("i_ADD_EMPLOYEE2").style.transition = "0.3s all ease";
    }
}

