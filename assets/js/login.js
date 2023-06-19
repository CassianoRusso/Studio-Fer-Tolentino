$(document).ready(function(){
    $(document).on("click", "#btn-login", function(){
        var email = $("#email").val();
        var password = $("#password").val();

        if(email == ''){
            $("#email").focus();
            return false;
        }
        if(password == ''){
            $("#password").focus();
            return false;
        }

       

    });


});