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
                output.innerHTML = ans;
            }
        }
    };
    console.log(el);
    rqst.open("get","scenarios/get-priority.php?champion=" + el, true);
    rqst.send();
}
