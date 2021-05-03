create or replace function ajout_cat(text,text)
returns integer
as
'
	declare f_nom_cat alias for $1;
	declare f_reference alias for $2;
	declare retour integer;
	declare id integer;

	begin
		select into id id_cat from pgi_categories where nom_cat = f_nom_cat and reference = f_reference ;
		if not found 
		then
			insert into pgi_categories (nom_cat,reference) values (f_nom_cat,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
'
language plpgsql;