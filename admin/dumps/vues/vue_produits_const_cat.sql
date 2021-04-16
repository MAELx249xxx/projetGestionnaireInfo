create or replace view vue_produits_const_cat as select
pgi_produits.id_prod,pgi_produits.nom_prod,pgi_produits.prix,pgi_produits.annee_prod, pgi_constructeurs.nom_const,pgi_categories.nom_cat
from pgi_produits, pgi_constructeurs,pgi_categories
where pgi_produits.id_const = pgi_constructeurs.id_const
and pgi_produits.id_cat = pgi_categories.id_cat;