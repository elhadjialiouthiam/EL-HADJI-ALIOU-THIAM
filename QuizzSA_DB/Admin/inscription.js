//  Debut 

window.onload=function(){

    $(document).ready(function () 

    {

        $("#btn").click(function(){

        $("#form").submit(function(e)

        {

            e.preventDefault()

            const prenom = $('#prenom').val();

            const nom = $('#nom').val();

            const login = $('#login').val();

            const password = $('#mdp').val();

            //const avatar = $('.btn-avatar').val();

            $.ajax({

                type: "POST",

                url: "insAdmin.php",

                data: {

                    prenom:prenom,

                    nom:nom,

                    login:login,

                    password:password,

                   // profil:avatar

                },               

                success: function (response) {

                    $('html').html(response)

                }

            });

            });

        });

    });

}