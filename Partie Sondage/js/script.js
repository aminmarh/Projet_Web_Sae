$(init);

var idcatege;
var niveau;
var civilite;
var cpt = 4;
var cptd = 4;
var i = 1;
var id = 1;
var alimpref_dej = [];
var alimpref_diner = [];

function init () {
    $('.responsive_menu').click(function () {
        $('.responsive_menu, .menu').toggleClass('active');
        $('.menu').toggleClass('responsive');
    });

    function ajoutalmc(e) {
        $.ajax({
            url: "../php/recateg.php",
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                $(e).find('option:not(:first)').remove();
                $.each(data, function (index, value) {
                    $(e).append('<option value="' + value.id + '">' + value.nom + '</option>');
                });
            }
        })
    };

    function ajoutalmsc(x, e) {
        $(x).change(function () {
            idcatege = $(this).val();
            console.log(idcatege);
            $.ajax({
                url: "../php/resouscateg.php",
                method: 'POST',
                data: {idcatege: idcatege},
                dataType: 'json',
                success: function (data) {
                    $(e).find('option:not(:first)').remove();
                    $.each(data, function (index, value) {
                        $(e).append('<option value="' + value.id + '">' + value.nom + '</option>');
                    });
                }
            })
        });
    };

    function ajoutalmssc(x, e) {
        $(x).change(function () {
            idsouscatege = $(this).val();
            console.log(idcatege);
            $.ajax({
                url: "../php/resscateg.php",
                method: 'POST',
                data: {idsouscatege: idsouscatege},
                dataType: 'json',
                success: function (data) {
                    $(e).find('option:not(:first)').remove();
                    $.each(data, function (index, value) {
                        $(e).append('<option value="' + value.id + '">' + value.nom + '</option>');
                    });
                }
            })
        });
    };

    function ajoutalm(x, e) {
        $(x).change(function () {
            idsoussouscatege = $(this).val();
            console.log(idcatege);
            $.ajax({
                url: "../php/realiment.php",
                method: 'POST',
                data: {idsoussouscatege: idsoussouscatege},
                dataType: 'json',
                success: function (data) {
                    $(e).find('option:not(:first)').remove();
                    $.each(data, function (index, value) {
                        $(e).append('<option value="' + value.id + '">' + value.nom + '</option>');
                    });
                }
            })
        });
    };

    ajoutalmc('#almc0');
    ajoutalmsc('#almc0', '#almsc0');
    ajoutalmssc('#almsc0', '#almssc0');
    ajoutalm('#almssc0', '#alm0');

    ajoutalmc('#almcd0');
    ajoutalmsc('#almcd0', '#almscd0');
    ajoutalmssc('#almscd0', '#almsscd0');
    ajoutalm('#almsscd0', '#almd0');


    function estPrenomNomValide(prenomNom) {
        var regex = /^[a-zA-ZÀ-ÿ\s,'-]*$/;
        return regex.test(prenomNom);
    };

    function estage(age) {
        var regex = /^[0-9]+$/;
        return regex.test(age);
    };

    function estcp(cp) {
        var regex = /^\d{5}$/;
        return regex.test(cp);
    };


    function estadresse(adresse) {
        var regex = /^[a-zA-Z0-9À-ÿ\s,'-]*$/;
        return regex.test(adresse);
    };

    function isValidEmail(email) {
        var emailRegex = /^\S+@\S+\.\S+$/;
        return emailRegex.test(email);
    };

    function estetab(etab) {
        var regex = /^[a-zA-ZÀ-ÿ\s,'-]*$/;
        return regex.test(etab);
    };

    function isValidPhoneNumber(num) {
        var phoneRegex = /^\d{10}$/;
        return phoneRegex.test(num);
    };

    function lderorantedej() {
        var val = true;
        for (var j = 1; j <= i; j++) {
            if ($("[id='almc" + (j - 1) + "']").val() == "" || $("[id='almsc" + (j - 1) + "']").val() == "" || $("[id='almssc" + (j - 1) + "']").val() == "" || $("[id='alm" + (j - 1) + "']").val() == "") {
                val = false;
                break;
            }
        }
        return val;
    };

    function lderorantediner() {
        var val = true;
        for (var z = 1; z <= id; z++) {
            if ($("[id='almcd" + (z - 1) + "']").val() == "" || $("[id='almscd" + (z - 1) + "']").val() == "" || $("[id='almsscd" + (z - 1) + "']").val() == "" || $("[id='almd" + (z - 1) + "']").val() == "") {
                val = false;
                break;
            }
        }
        return val;
    };

    $('input[name="civilite"]').change(function () {
        civilite = $('input[name="civilite"]:checked').val();
    });

    $(".niveau_classe").change(function () {
        niveau = $(this).val()
    });

    $("#ajouterali").click(function () {
        if (cpt <= 0) {
            alert(("Vous avez atteint le nombre maximum d'aliments à ajouter"));
        } else {

            if ($("[id='almc" + (i - 1) + "']").val() != "" && $("[id='almsc" + (i - 1) + "']").val() != "" && $("[id='almssc" + (i - 1) + "']").val() != "" && $("[id='alm" + (i - 1) + "']").val() != "") {
                var cat = $('#cat' + i);
                if (!cat.attr('data-generated')) {

                    var categ = $('<select id="almc' + i + '" name="niveau" class="alm"> <option value="">La catégorie de votre aliment</option> </select>');
                    ajoutalmc("[id='almc" + i + "']");

                    var souscateg = $('<select id="almsc' + i + '" name="niveau" class="almc"> <option value="">La sous catégorie de votre aliment</option> </select>');


                    var soussouscateg = $('<select id="almssc' + i + '" name="niveau" class="almc"> <option value="">La sous sous catégorie de votre aliment</option> </select>');


                    var aliment = $('<select id="alm' + i + '" name="niveau" class="alm"> <option value="">L\'aliment</option> </select>');


                    cat.append(categ, souscateg, soussouscateg, aliment);
                    cat.attr('data-generated', true);
                    cpt = cpt - 1;

                    ajoutalmsc("[id='almc" + i + "']", "[id='almsc" + i + "']");
                    ajoutalmssc("[id='almsc" + i + "']", "[id='almssc" + i + "']");
                    ajoutalm("[id='almssc" + i + "']", "[id='alm" + i + "']");
                }
                i++;
            } else {
                alert("Vous devez choisir un aliment");
            }
        }
    });

    $("#ajouterali1").click(function () {
        if (cptd <= 0) {
            alert(("Vous avez atteint le nombre maximum d'aliments à ajouter"));
        } else {

            if ($("[id='almcd" + (id - 1) + "']").val() != "" && $("[id='almscd" + (id - 1) + "']").val() != "" && $("[id='almsscd" + (id - 1) + "']").val() != "" && $("[id='almd" + (id - 1) + "']").val() != "") {
                var cat = $('#catd' + id);
                if (!cat.attr('data-generated')) {

                    var categ = $('<select id="almcd' + id + '" name="niveau" class="alm"> <option value="">La catégorie de votre aliment</option> </select>');
                    ajoutalmc("[id='almcd" + id + "']");

                    var souscateg = $('<select id="almscd' + id + '" name="niveau" class="almc"> <option value="">La sous catégorie de votre aliment</option> </select>');


                    var soussouscateg = $('<select id="almsscd' + id + '" name="niveau" class="almc"> <option value="">La sous sous catégorie de votre aliment</option> </select>');


                    var aliment = $('<select id="almd' + id + '" name="niveau" class="alm"> <option value="">L\'aliment</option> </select>');


                    cat.append(categ, souscateg, soussouscateg, aliment);
                    cat.attr('data-generated', true);
                    cptd = cptd - 1;

                    ajoutalmsc("[id='almcd" + id + "']", "[id='almscd" + id + "']");
                    ajoutalmssc("[id='almscd" + id + "']", "[id='almsscd" + id + "']");
                    ajoutalm("[id='almsscd" + id + "']", "[id='almd" + id + "']");

                }
                id++;
            } else {
                alert("Vous devez choisir un aliment");
            }
        }
    });

    $("#valider").click(function () {
        var nom = $("#nom").val();
        var prenom = $("#prenom").val();
        var age = $("#age").val();
        var email = $("#email").val();
        var num = $("#num").val();
        var addresse = $("#addrese").val();
        var cp = $("#cp").val();
        var etab = $("#etab").val();


        if (!$('input[name="civilite"]').is(':checked') ||
            nom.trim() === "" ||
            prenom.trim() === "" ||
            age.trim() === "" ||
            email.trim() === "" ||
            num.trim() === "" ||
            addresse.trim() === "" ||
            cp.trim() === "" ||
            etab.trim() === "" ||
            niveau.trim() === "" ||
            lderorantedej() == false ||
            lderorantediner() == false) {
            alert("Veuillez remplir tous les champs requis !");
            return;
        } else if (!estPrenomNomValide(nom)) {
            alert("Veuillez entrer un nom valide !");
            return;
        } else if (!estPrenomNomValide(prenom)) {
            alert("Veuillez entrer un prénom valide !");
            return;
        } else if (!estage(age)) {
            alert("Veuillez entrer un âge valide !");
            return;
        } else if (!isValidEmail(email)) {
            alert("Veuillez entrer une adresse e-mail valide !");
            return;
        } else if (!isValidPhoneNumber(num)) {
            alert("Veuillez entrer un numéro de téléphone valide !");
            return;
        } else if (!estadresse(addresse)) {
            alert("Veuillez entrer une adresse valide !");
            return;
        } else if (!estcp(cp)) {
            alert("Veuillez entrer un code postal valide !");
            return;
        } else if (!estetab(etab)) {
            alert("Veuillez entrer un établissement valide !");
            return;
        } else {
            for (var j = 0; j < i; j++) {
                alimpref_dej.push($("[id='alm" + j + "']").val());
            }
            for (var z = 0; z < id; z++) {
                alimpref_diner.push($("[id='almd" + z + "']").val());
            }

            $.ajax({
                url: "../php/ajoutalimpref.php",
                data: {
                    civilite : civilite,
                    nom: nom,
                    prenom: prenom,
                    age: age,
                    email: email,
                    num: num,
                    addresse: addresse,
                    cp: cp,
                    etab:etab,
                    niveau: niveau,
                    alimm_dej: alimpref_dej,
                    alimm_diner: alimpref_diner
                },
                method: 'POST',
                success: function(data) {
                    alert(data);
                }
            })
        }

    });
};


