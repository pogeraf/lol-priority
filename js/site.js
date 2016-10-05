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
            var ans = rqst.responseText;
            console.log(ans);
            var output = document.getElementById("output");
            if (output) {
                output.innerHTML = ans;
            }
        }
    };
    rqst.open("get","scripts/get-priority.php?champion=" + el, true);
    rqst.send();
}
