function dateValid() {
    var inputDate = document.getElementById("dateInput").value.trim();
    // var matchVal = "^\d{ 4}\-(0 ? [1 - 9] | 1[012]) \-(0 ? [1 - 9] | [12][0 - 9] | 3[01])";

    if (moment(inputDate, ["YYYY-MM-DD", "YYYY-M-D"], true).isValid()) {
        document.getElementById("submit").disabled = false;
        return true;
    }
    else {
        // alert("invalid date");
        document.getElementById("submit").disabled = true;
        return false;
    }
}

function enableInput(selectVal) {
    let selectElement = document.getElementById("selectElement");
    if (selectElement.value == "custom") {
        document.getElementById("dateInput").disabled = false;
        console.log("disabled");
    }
}