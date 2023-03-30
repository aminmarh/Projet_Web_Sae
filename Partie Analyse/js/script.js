$(init);
var data;

function init(){
    $("#btnconnexion").click(function() {
        var identifiant = $("#identifiant").val();
        var mdp = $("#mdp").val();
        if((!identifiant == "") || (!mdp == "")){
            $.ajax({
                url: "./php/verifcompte.php",
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (identifiant == data.at(0).identifiant && mdp == data.at(0).mdp){
                        window.location.href = "../html/analyse.html";
                        return
                    }
                    else{
                        alert("Mail ou mot de passe erroné");
                        return;
                    }
                }   
            });
        }
        else{
            alert("Veuillez remplir tous les champs requis !")
            return
        }
    });

}