function myFunction(){
    document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event){
    if(!event.target.matches('.rounded-circle me-2')){
        var dropdowns = document.getElementsByClassName("dropdown-menu text-small shadow");
        var i;
        for (i = 0; i < dropdowns.length; ++i) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
        }
    }
}
}

