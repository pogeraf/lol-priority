function getPriority() {
    var els = document.getElementsByClassName('champion');
    if (!els.length) {
        return false;
    }
    var el = els[0].value;

    rqst = new XMLHttpRequest();

    rqst.onreadystatechange = function()
    {
        if (rqst.readyState == 4 && rqst.status == 200)
        {
            var ans  = rqst.responseText;
            var resp = JSON.parse(ans);
            console.log(ans);
            console.log(resp);
            var output = document.getElementById("output");
            if (output) {
                var content = output.innerHTML;
                output.innerHTML = ans+ "<br>" + content;
            }
        }
    };
    console.log(el);
    rqst.open("post","scenarios/get-priority.php", true);
    rqst.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    rqst.send('champion= ' + el);
    setClearButton();
}

function clearOutput() {
    var output = document.getElementById("output");
    if (output) {
        output.innerHTML = '';
    }
    var clBtn  = document.getElementsByClassName("cl-btn");
    var len    = clBtn.length;
    for (var i = 0; i < len; i++) {
        clBtn[i].setAttribute('hidden', false);
    }
}

function setClearButton() {
    var clBtn  = document.getElementsByClassName("cl-btn");
    var len = clBtn.length;
    for (var i = 0; i < len; i++) {
        clBtn[i].removeAttribute('hidden');
    }
}
