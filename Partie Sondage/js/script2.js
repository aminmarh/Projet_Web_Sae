$(init);


function init () {
    $.ajax({
        url: "../php/afficheravis.php",
        method: 'POST',
        dataType: 'json',
        success: function(data) {

            $.each(data, function (index, value) {
                $("body").append('<section id="facts"><div class="container"><p><i class="fa-solid fa-quote-left"></i>' + value.avis + '</p><div class="person"><div>' +value.nom + " " + value.prenom + '</div></div></div></section>');
            });
        }
    })

    $('.responsive_menu').click(function () {
        $('.responsive_menu, .menu').toggleClass('active');
        $('.menu').toggleClass('responsive');
    });

    function estPrenomNomValide(prenomNom) {
        var regex = /^[a-zA-ZÀ-ÿ\s,'-]*$/;
        return regex.test(prenomNom);
    };

    $("#submit").click(function(){
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var com = $("#com").val();

        if (nom.trim() === "" || prenom.trim() === "" || com.trim() === "") {
            alert("Veuillez remplir tous les champs requis !");
            return;
        } else if (!estPrenomNomValide(nom)) {
            alert("Veuillez entrer un nom valide !");
            return;
        } else if (!estPrenomNomValide(prenom)) {
            alert("Veuillez entrer un prénom valide !");
            return;
        } else{
            $.ajax({
                url: "../php/ajoutavis.php",
                
                data:{
                    nom: nom,
                    prenom: prenom,
                    com: com,
    
                },
                method: 'POST',
                success: function(data) {
                    alert(data);
                }
            })
        }
    })
};