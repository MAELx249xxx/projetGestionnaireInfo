create or replace function ajout_produit(text,real,integer,integer,integer,text)
returns integer
as
'
	declare f_nom_prod alias for $1;
	declare f_prix alias for $2;
	declare f_annee_prod alias for $3;
	declare f_id_const alias for $4;
	declare f_id_cat alias for $5;
	declare f_reference alias for $6;
	declare retour integer;
	declare id integer;

	begin
		select into id id_prod from pgi_produits where nom_prod = f_nom_prod and reference = f_reference ;
		if not found 
		then
			insert into pgi_produits (nom_prod,prix,annee_prod,id_const,id_cat,reference) values (f_nom_prod,f_prix,f_annee_prod,f_id_const,f_id_cat,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
'
language plpgsql;