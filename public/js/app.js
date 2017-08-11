
// slider javascript with jquery

// Display First Tweet
var slideIndex = 1;
showDivs(slideIndex);


//Call function to change slide
function plusDivs(n) {
    showDivs(slideIndex += n);
}

//function to change slide
function showDivs(n) {

    var i;
    //get All slides
    var x = document.getElementsByClassName("mySlides");

    if (n > x.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = x.length;
    }
    //hide all slides
    for (i = 0; i < x.length; i++) {
        $(x[i]).hide();
    }
    // show next slide
    $(x[slideIndex-1]).show();
}
//time interval for changing slide
setInterval(function(){ plusDivs(1); },5000);
//end of slider javascript
