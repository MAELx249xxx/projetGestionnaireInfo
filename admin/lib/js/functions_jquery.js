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
                        $('#editer').show();
                        $('#supprimer').show();
                    } else {
                        $('#editer').hide();
                        $('#inserer').show();
                        $('#supprimer').hide();
                    }
                    $('#prix').val(data[0].prix);
                    $('#annee_prod').val(data[0].annee_prod);
                    $('#id_const').val(data[0].id_const);
                    $('#id_cat').val(data[0].id_cat);
                    $('#id_prod').val(data[0].id_prod);
                }
            });
            $('#referenceproduit').click(function () {
                $('#referenceproduit').val('');
                $('#nom_prod').val('');
                $('#prix').val('');
                $('#annee_prod').val('');
                $('#id_const').val('');
                $('#id_cat').val('');
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
                        $('#editer').show();
                        $('#supprimer').show();
                    } else {
                        $('#editer').hide();
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

});