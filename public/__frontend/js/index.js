// document.getElementById('nav-toggle').onclick = function(){
//     document.getElementById("nav-content").classList.toggle("hidden");
// }

$(document).click(function(e) {
    if(!$('nav').has($(e.target)).length) {
        $('#nav-content').addClass('hidden');
    }
});

$('#nav-toggle').click(function (e) {
    $('#nav-content').toggleClass('hidden');
});

AOS.init({
    offset: 120, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 1000, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-top', // defines which position of the element regarding to window should trigger the animation
});