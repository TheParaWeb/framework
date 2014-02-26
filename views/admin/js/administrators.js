$(function () {

    $('.delete').click(function(){
        var retVal = confirm("Are you sure you want to delete this user?");
        if( retVal == true ){
            return true;
        }else{
            return false;
        }
    });

});