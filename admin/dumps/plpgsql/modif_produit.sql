create or replace function modif_produit(integer, text,real,integer,integer,integer,text) 
returns integer
    
as 
'
	declare 
	  f_id_prod alias for $1;
	  f_nom_prod alias for $2;
	  f_prix alias for $3;
	  f_annee_prod alias for $4;
	  f_id_const alias for $5;
	  f_id_cat alias for $6;
	  f_reference alias for $7;
	  id integer;
	  
	begin
	  select into id id_prod from pgi_produits where id_prod=f_id_prod;
	  if not found
	  then
		return 0;
	  else
		update pgi_produits set nom_prod=f_nom_prod, prix=f_prix,annee_prod=f_annee_prod,id_const=f_id_const,id_cat=f_id_cat, reference=f_reference where id_prod=id;
		return 1;
	  end if;
	end;
'
language plpgsql;
