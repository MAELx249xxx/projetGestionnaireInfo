create or replace function supp_produit(integer) 
returns integer
    
as 
'
	declare 
	  f_id_prod alias for $1;
	  id integer;
	  
	begin
	  select into id id_prod from pgi_produits where id_prod=f_id_prod;
	  if not found
	  then
		return 0;
	  else
		delete from pgi_produits where id_prod = f_id_prod;
		return 1;
	  end if;
	end;
'
language plpgsql;