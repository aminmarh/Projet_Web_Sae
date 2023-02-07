$(init);

function init (){
    $('.responsive_menu').click(function() {
        $('.responsive_menu, .menu').toggleClass('active');
        $('.menu').toggleClass('responsive');
    });

    $("#ajouterali").click(function(){
        $("#cat").clone().prependTo( "#test" );
    })

    $("#ajouterali1").click(function(){
        $("#cat1").clone().prependTo( "#test1" );
    })


    $(".almc").on("click",function (){
        alert("cc");
        $.post("../html/resouscateg.php",{idcateg : $("#test").val()},function(data){
            alert(data);
        });
        return false;
    });
}