$(document).ready(function(){

    //pour pouvoir utiliser regex
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");
    
    
    $("#form_Envoyer").validate({
        rules: {
            pseudo:"required",
            mdp:"required",
            nom:{ required:true,
            regex:/^[a-zA-Z]$/},
            prenom: "required",
            
            adresse: "required",
            ville: "required",
            
            pays: "required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
});
