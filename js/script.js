$(init);

var idcatege;

function init (){
    $('.responsive_menu').click(function() {
        $('.responsive_menu, .menu').toggleClass('active');
        $('.menu').toggleClass('responsive');
    });

    $("#ajouterali").click(function(){
        var Element = $('<select id="almc" name="niveau" class="alm"><option value="">La catégorie de votre aliment</option></select><select id="almsc" name="niveau" class="almc"><option value="">La sous catégorie</option></select><select id="almssc" name="niveau" class="almc"><option value="">La sous sous catégorie</option></select><select id="alm" name="niveau" class="alm"><option value="">L\'aliment</option></select>');
        $('#cat').append(Element);
    })

    $("#ajouterali1").click(function(){
        $('#almscd').find('option:not(:first)').remove();
        $('#almsscd').find('option:not(:first)').remove();
        $('#almd').find('option:not(:first)').remove();
        $("#cat1").clone().prependTo( "#test1" );
    })

    $.ajax({
        url: "../php/recateg.php",
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            $('#almc').find('option:not(:first)').remove();
            $.each(data, function(index, value) {
                $('#almc').append('<option value="' + value.id + '">' + value.nom + '</option>');
            });                
        }   
    })

    $('#almc').change(function (){
        idcatege = $(this).val();
        console.log(idcatege);
        $.ajax({
            url: "../php/resouscateg.php",
            method: 'POST',
            data: {idcatege: idcatege},
            dataType: 'json',
            success: function(data) {
                $('#almsc').find('option:not(:first)').remove();
                $.each(data, function(index, value) {
                    $('#almsc').append('<option value="' + value.id + '">' + value.nom + '</option>');
                });                
            }   
        })
    });

    $('#almsc').change(function (){
        idsouscatege = $(this).val();
        console.log(idcatege);
        $.ajax({
            url: "../php/resscateg.php",
            method: 'POST',
            data: {idsouscatege: idsouscatege},
            dataType: 'json',
            success: function(data) {
                $('#almssc').find('option:not(:first)').remove();
                $.each(data, function(index, value) {
                    $('#almssc').append('<option value="' + value.id + '">' + value.nom + '</option>');
                });                
            }   
        })
    });

    $('#almssc').change(function (){
        idsoussouscatege = $(this).val();
        console.log(idcatege);
        $.ajax({
            url: "../php/realiment.php",
            method: 'POST',
            data: {idsoussouscatege: idsoussouscatege},
            dataType: 'json',
            success: function(data) {
                $('#alm').find('option:not(:first)').remove();
                $.each(data, function(index, value) {
                    $('#alm').append('<option value="' + value.id + '">' + value.nom + '</option>');
                });                
            }   
        })
    });

    $.ajax({
        url: "../php/recateg.php",
        method: 'POST',
        dataType: 'json',
        success: function(data) {
            $('#almcd').find('option:not(:first)').remove();
            $.each(data, function(index, value) {
                $('#almcd').append('<option value="' + value.id + '">' + value.nom + '</option>');
            });                
        }   
    })

    $('#almcd').change(function (){
        idcatege = $(this).val();
        console.log(idcatege);
        $.ajax({
            url: "../php/resouscateg.php",
            method: 'POST',
            data: {idcatege: idcatege},
            dataType: 'json',
            success: function(data) {
                $('#almscd').find('option:not(:first)').remove();
                $.each(data, function(index, value) {
                    $('#almscd').append('<option value="' + value.id + '">' + value.nom + '</option>');
                });                
            }   
        })
    });

    $('#almscd').change(function (){
        idsouscatege = $(this).val();
        console.log(idcatege);
        $.ajax({
            url: "../php/resscateg.php",
            method: 'POST',
            data: {idsouscatege: idsouscatege},
            dataType: 'json',
            success: function(data) {
                $('#almsscd').find('option:not(:first)').remove();
                $.each(data, function(index, value) {
                    $('#almsscd').append('<option value="' + value.id + '">' + value.nom + '</option>');
                });                
            }   
        })
    });

    $('#almsscd').change(function (){
        idsoussouscatege = $(this).val();
        console.log(idcatege);
        $.ajax({
            url: "../php/realiment.php",
            method: 'POST',
            data: {idsoussouscatege: idsoussouscatege},
            dataType: 'json',
            success: function(data) {
                $('#almd').find('option:not(:first)').remove();
                $.each(data, function(index, value) {
                    $('#almd').append('<option value="' + value.id + '">' + value.nom + '</option>');
                });                
            }   
        })
    });

    $("#valider").click(function(){
        // $.ajax({
        //     url: "../php/ajoutalimpref.php",
        //     method: 'POST',
        //     success: function(data) {
        //         console.log(data); 
        //     }   
        // })
        alert("cc");

        $.post("../php/ajoutalimpref.php",function(data){
          });
          return false;
    });


}