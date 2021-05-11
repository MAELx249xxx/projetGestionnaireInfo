$(document).ready(function () {

    $('#referenceproduit').blur(function () {
        var reference = $(this).val();

        if (reference != '') {
            var parametre = "reference=" + reference;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/AjaxReferenceProduit.php',
                success: function (data) {
                    console.log(data);
                    $('#nom_prod').val(data[0].nom_prod);
                    if ($('#nom_prod').val() != '') {
                        $('#inserer').hide();
                        $('#editer_prod').show();
                        $('#supprimer').show();
                    } else {
                        $('#editer_prod').hide();
                        $('#inserer').show();
                        $('#supprimer').hide();
                    }
                    $('#prix').val(data[0].prix);
                    $('#annee_prod').val(data[0].annee_prod);
                    $('#choix_categorie').val(data[0].id_cat);
                    $('#choix_constructeur').val(data[0].id_const);
                    $('#id_prod').val(data[0].id_prod);
                }
            });
            $('#referenceproduit').click(function () {
                $('#referenceproduit').val('');
                $('#nom_prod').val('');
                $('#prix').val('');
                $('#annee_prod').val('');
                $('#choix_categorie').val('');
                $('#choix_constructeur').val('');
                $('#id_prod').val('');
            });
        }
    });


    $("#loginutilisateur").blur(function () {
        var loginutilisateur = $(this).val();

        if (loginutilisateur != '') {
            var parametre = "loginutilisateur=" + loginutilisateur;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/AjaxLoginUtilisateur.php',
                success: function (data) {
                    console.log(data);
                    $('#nom_utili').val(data[0].nom_utili);
                    if ($('#nom_utili').val() != '') {
                        $('#supprimer').show();
                    } else {
                        $('#supprimer').hide();
                    }
                    $('#prenom').val(data[0].prenom);
                    $('#password').val(data[0].password);
                    $('#rue').val(data[0].rue);
                    $('#num').val(data[0].num);
                    $('#pays').val(data[0].pays);
                    $('#ville').val(data[0].ville);
                    $('#id_utili').val(data[0].id_utili);
                }
            });
            $('#loginutilisateur').click(function () {
                $('#loginutilisateur').val('');
                $('#nom_utili').val('');
                $('#prenom').val('');
                $('#password').val('');
                $('#rue').val('');
                $('#num').val('');
                $('#pays').val('');
                $('#ville').val('');
                $('#id_utili').val('');
            });
        }
    });

    $("#referenceadmin").blur(function () {
        var reference = $(this).val();

        if (reference != '') {
            var parametre = "reference=" + reference;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/AjaxReferenceAdmin.php',
                success: function (data) {
                    console.log(data);
                    $('#login').val(data[0].login);
                    if ($('#login').val() != '') {
                        $('#inserer').hide();
                        $('#editer_admin').show();
                        $('#supprimer').show();
                    } else {
                        $('#editer_admin').hide();
                        $('#inserer').show();
                        $('#supprimer').hide();
                    }
                    $('#password').val(data[0].password);
                    $('#id_admin').val(data[0].id_admin);
                }
            });
            $('#referenceadmin').click(function () {
                $('#referenceadmin').val('');
                $('#login').val('');
                $('#password').val('');
                $('#id_admin').val('');
            });
        }
    });


    $("#referenceconst").blur(function () {
        var reference = $(this).val();

        if (reference != '') {
            var parametre = "reference=" + reference;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/AjaxReferenceConst.php',
                success: function (data) {
                    console.log(data);
                    $('#nom_const').val(data[0].nom_const);
                    if ($('#nom_const').val() != '') {
                        $('#inserer').hide();
                    }
                    else{
                        $('#inserer').show();
                    }
                    $('#pays').val(data[0].pays);
                    $('#id_const').val(data[0].id_const);
                }
            });
            $('#referenceconst').click(function () {
                $('#referenceconst').val('');
                $('#nom_const').val('');
                $('#pays').val('');
                $('#id_const').val('');
            });
        }
    });


    $("#referencecat").blur(function () {
        var reference = $(this).val();

        if (reference != '') {
            var parametre = "reference=" + reference;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/AjaxReferenceCat.php',
                success: function (data) {
                    console.log(data);
                    $('#nom_cat').val(data[0].nom_cat);
                    if ($('#nom_cat').val() != '') {
                        $('#inserer').hide();
                    }
                    else{
                        $('#inserer').show();
                    }
                    $('#id_cat').val(data[0].id_cat);
                }
            });
            $('#referencecat').click(function () {
                $('#referencecat').val('');
                $('#nom_cat').val('');
                $('#id_cat').val('');
            });
        }
    });

    $('#submit_id').remove();

    $('#choix_produit').change(function () {
        var attribut = $(this).attr('name');
        var id = $(this).val();
        var parametre = "id_prod=" + id;

        $.ajax({
            type: 'GET',
            data: parametre,
            dataType: 'json',
            url: './admin/lib/php/ajax/ajaxDetailProduit.php',
            success: function (data) {
                console.log(data);
                $('#id_prod').html("- Le nom du produit est " + data[0].nom_prod + ".</b><br> - Son prix: " + data[0].prix + " €.</b><br> - Son année de production: " + data[0].annee_prod + ".</b><br> - Son constructeur: " + data[0].nom_const + ".</b><br> - Il fait partie de la catégorie: " + data[0].nom_cat + ".");
            }
        });
    });

    $('#loginutilisateur2').ready(function (){
        var loginutilisateur2 = $.trim($('#loginutilisateur2').val());
        var parametre = 'loginutilisateur2='+loginutilisateur2;

        $.ajax({
            type: 'GET',
            data: parametre,
            dataType: 'json',
            url: './admin/lib/php/ajax/AjaxLoginUtilisateur2.php',
            success: function (data) {
                console.log(data);
                $('#nom_utili2').val(data[0].nom_utili);
                $('#prenom2').val(data[0].prenom);
                $('#password2').val(data[0].password);
                $('#rue2').val(data[0].rue);
                $('#num2').val(data[0].num);
                $('#pays2').val(data[0].pays);
                $('#ville2').val(data[0].ville);
                $('#id_utili2').val(data[0].id_utili);

            }
        })
    });

    $('#editer_uti').click(function (){
        var id_utili = $.trim($('#id_utili2').val());
        var login = $.trim($('#loginutilisateur2').val());
        var nom = $.trim($('#nom_utili2').val());
        var prenom = $.trim($('#prenom2').val());
        var password = $.trim($('#password2').val());
        var rue = $.trim($('#rue2').val());
        var num = $.trim($('#num2').val());
        var pays = $.trim($('#pays2').val());
        var ville = $.trim($('#ville2').val());

        var parametre = 'id_utili='+id_utili+'&login='+login+'&nom='+nom+'&prenom='+prenom+'&password='+password+'&rue='+rue+'&num='+num+'&pays='+pays+'&ville='+ville;

        $.ajax({
            type:'GET',
            data: parametre,
            dataType: 'json',
            url: 'admin/lib/php/ajax/ajaxUpdateUtilisateur.php',
            success: function (data){
                console.log(data);
            }
        });
        setTimeout(function(){location.reload()}, 500);
    });

    $('#editer_admin').click(function (){
        var id_admin = $.trim($('#id_admin').val());
        var login = $.trim($('#login').val());
        var password = $.trim($('#password').val());
        var reference = $.trim($('#referenceadmin').val());

        var parametre = 'id_admin='+id_admin+'&login='+login+'&password='+password+'&reference='+reference;

        $.ajax({
            type:'GET',
            data: parametre,
            dataType: 'json',
            url: './lib/php/ajax/ajaxUpdateAdmin.php',
            success: function (data){
                console.log(data);
            }
        });
        setTimeout(function(){location.reload()}, 500);
    });

    $('#editer_prod').click(function (){
        var id_prod = $.trim($('#id_prod').val());
        var nom_prod = $.trim($('#nom_prod').val());
        var prix = $.trim($('#prix').val());
        var annee_prod = $.trim($('#annee_prod').val());
        var id_const = $.trim($('#choix_constructeur').val());
        var id_cat = $.trim($('#choix_categorie').val());
        var reference = $.trim($('#referenceproduit').val());

        var parametre = 'id_prod='+id_prod+'&nom_prod='+nom_prod+'&prix='+prix+'&annee_prod='+annee_prod+'&id_const='+id_const+'&id_cat='+id_cat+'&reference='+reference;

        $.ajax({
            type:'GET',
            data: parametre,
            dataType: 'json',
            url: './lib/php/ajax/ajaxUpdateProduit.php',
            success: function (data){
                console.log(data);
            }
        });
        setTimeout(function(){location.reload()}, 500);
    });

});