function vw_home_renovation_open_tab(evt, cityName) {
    var vw_home_renovation_i, vw_home_renovation_tabcontent, vw_home_renovation_tablinks;
    vw_home_renovation_tabcontent = document.getElementsByClassName("tabcontent");
    for (vw_home_renovation_i = 0; vw_home_renovation_i < vw_home_renovation_tabcontent.length; vw_home_renovation_i++) {
        vw_home_renovation_tabcontent[vw_home_renovation_i].style.display = "none";
    }
    vw_home_renovation_tablinks = document.getElementsByClassName("tablinks");
    for (vw_home_renovation_i = 0; vw_home_renovation_i < vw_home_renovation_tablinks.length; vw_home_renovation_i++) {
        vw_home_renovation_tablinks[vw_home_renovation_i].className = vw_home_renovation_tablinks[vw_home_renovation_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});