create or replace function ajout_produit(text,real,integer,integer,integer) returns integer
as
'
	declare f_nom_produit alias for $1;
	declare f_prix alias for $2;
	declare f_annee alias for $3;
	declare f_const alias for $4;
	declare f_cat alias for $5;
	declare id integer;
	declare retour integer;
begin
	select into id id_prod from pgi_produits where nom = f_nom_produit;
	if not found
	then
		insert into pgi_produits(nom,prix,annee_prod,id_const,id_cat) values (f_nom_produit,f_prix,f_annee,f_const,f_cat);
		retour = 1;
	else
		retour = 0;
	end if;
	return retour;
end
'
language 'plpgsql';