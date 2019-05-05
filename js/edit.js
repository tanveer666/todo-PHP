function dateValid() {
    var inputDate = document.getElementById("date").value.trim();
    // var matchVal = "^\d{ 4}\-(0 ? [1 - 9] | 1[012]) \-(0 ? [1 - 9] | [12][0 - 9] | 3[01])";

    if (moment(inputDate, ["YYYY-MM-DD", "YYYY-M-D"], true).isValid()) {
        document.getElementById("dateText").innerHTML = "valid date";
        // document.getElementById("submit").disabled = false;
        return true;
    }
    else {
        alert("invalid date");
        // document.getElementById("submit").disabled = true;
        return false;
    }
}


function timeValid() {
    var inputTime = document.getElementById("time").value.trim();

    if (moment(inputTime, ["HH:mm", "h:mm a","HH:mm:ss","h:mm:ss a"],true).isValid()) {
        document.getElementById("dateText").innerHTML = "Valid";
        // document.getElementById("submit").disabled = false;
        return true;
    }
    else {
        alert("invalid time");
        // document.getElementById("submit").disabled = true;
        return false;
    }

}