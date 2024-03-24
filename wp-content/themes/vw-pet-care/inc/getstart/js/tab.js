function vw_pet_care_open_tab(evt, cityName) {
    var vw_pet_care_i, vw_pet_care_tabcontent, vw_pet_care_tablinks;
    vw_pet_care_tabcontent = document.getElementsByClassName("tabcontent");
    for (vw_pet_care_i = 0; vw_pet_care_i < vw_pet_care_tabcontent.length; vw_pet_care_i++) {
        vw_pet_care_tabcontent[vw_pet_care_i].style.display = "none";
    }
    vw_pet_care_tablinks = document.getElementsByClassName("tablinks");
    for (vw_pet_care_i = 0; vw_pet_care_i < vw_pet_care_tablinks.length; vw_pet_care_i++) {
        vw_pet_care_tablinks[vw_pet_care_i].className = vw_pet_care_tablinks[vw_pet_care_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});