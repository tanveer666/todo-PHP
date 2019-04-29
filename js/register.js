function matchPass() {
    pass1Val = document.getElementById("pass1").value;
    pass2Val = document.getElementById("pass2").value;


    if(pass1Val.length == 0 && pass2Val.length == 0) {
        document.getElementById("match").innerText = "";
    }
    else if(pass1Val === pass2Val) {
        document.getElementById("match").style.color = "lime";
        document.getElementById("match").innerHTML = "Passwords match";
        document.getElementById("submit").disabled = false;
        searchUser();
    }
    else {
        document.getElementById("match").style.color = "black";
        document.getElementById("match").innerHTML = "Passwords do not match";
        document.getElementById("submit").disabled = true;
    }

}


function searchUser() {
    userName = document.getElementById("userName").value;
    // document.getElementById("suggest").innerHTML = userName;

    if (userName.length == 0) {
        document.getElementById("suggest").innerHTML = "Enter your user name";
        document.getElementById("submit").disabled = true;
    } else {
        var xmlhttp = new XMLHttpRequest(); // new request obejct
        // document.getElementById("suggest").innerHTML = "request object created";
        xmlhttp.onreadystatechange = function () { //on a change of request state, execute this function
            if (this.readyState == 4 && this.status == 200) { //if the request is successfull.
                if( this.responseText === "True") {
                    document.getElementById("submit").disabled = false;
                    document.getElementById("suggest").innerHTML = "Username is available";
                    matchPass();
                }
                else {
                    document.getElementById("submit").disabled = true;
                    document.getElementById("suggest").innerHTML = "Username is already in use, chose something else";
                }
            }
        };

        xmlhttp.open("GET", "php/searchUser.php?name=" + userName, true);
        xmlhttp.send();
    }
}