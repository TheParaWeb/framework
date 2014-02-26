$(function () {
    $('.deactivate').click(function(){
        var retVal = confirm("Deactivating this district will also deactivate all schools within this district. Continue?");
        if( retVal == true ){
            return true;
        }else{
            return false;
        }
    });

    $('.activateDistrict').click(function(){
        $('#activateDistrict').hide();
        $('#deactivateDistricts').show();
    });

    $('.deactivateDistricts').click(function(){
        $('#deactivateDistricts').hide();
        $('#activateDistrict').show();
    });

});