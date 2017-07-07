
// User menu toggle
$("#dropdown-menu a").on("click", function(event) {
    $(this).parent().toggleClass("open");
});
$("body").on("click", function(event) {
    if(!$("#dropdown-menu").is(event.target) && $("#dropdown-menu").has(event.target).length === 0) {
        $("#dropdown-menu").removeClass("open");
    }
});








// Handle Enable/Disable
$("#pihole-enable").on("click", function(e){
    e.preventDefault();
    localStorage.removeItem("countDownTarget");
    piholeChange("enable","");
});
$("#pihole-disable-permanently").on("click", function(e){
    e.preventDefault();
    piholeChange("disable","0");
});
$("#pihole-disable-10s").on("click", function(e){
    e.preventDefault();
    piholeChange("disable","10");
});
$("#pihole-disable-30s").on("click", function(e){
    e.preventDefault();
    piholeChange("disable","30");
});
$("#pihole-disable-5m").on("click", function(e){
    e.preventDefault();
    piholeChange("disable","300");
});
$("#pihole-disable-custom").on("click", function(e){
    e.preventDefault();
    var custVal = $("#customTimeout").val();
    custVal = $("#btnMins").hasClass("active") ? custVal * 60 : custVal;
    piholeChange("disable",custVal);
});




// Credit for following function: https://gist.github.com/alexey-bass/1115557
// Modified to discard any possible "v" in the string
function versionCompare(left, right) {
    if (typeof left + typeof right !== "stringstring")
    {
        return false;
    }

    // If we are on vDev then we assume that it is always
    // newer than the latest online release, i.e. version
    // comparison should return 1
    if(left === "vDev")
    {
        return 1;
    }

    var aa = left.split("v"),
        bb = right.split("v");

    var a = aa[aa.length-1].split(".")
        ,   b = bb[bb.length-1].split(".")
        ,   i = 0, len = Math.max(a.length, b.length);

    for (; i < len; i++) {
        if ((a[i] && !b[i] && parseInt(a[i]) > 0) || (parseInt(a[i]) > parseInt(b[i]))) {
            return 1;
        } else if ((b[i] && !a[i] && parseInt(b[i]) > 0) || (parseInt(a[i]) < parseInt(b[i]))) {
            return -1;
        }
    }
    return 0;
}











function testCookies()
{
    if (navigator.cookieEnabled)
    {
        return true;
    }

    // set and read cookie
    document.cookie = "cookietest=1";
    var ret = document.cookie.indexOf("cookietest=") !== -1;

    // delete cookie
    document.cookie = "cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT";

    return ret;
}

$(function() {
    if(!testCookies() && $("#cookieInfo").length)
    {
        $("#cookieInfo").show();
    }
});
