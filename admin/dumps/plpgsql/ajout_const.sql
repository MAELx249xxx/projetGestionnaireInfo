create or replace function ajout_const(text,text,text)
returns integer
as
'
	declare f_nom_const alias for $1;
	declare f_pays alias for $2;
	declare f_reference alias for $3;
	declare retour integer;
	declare id integer;

	begin
		select into id id_const from pgi_constructeurs where nom_const = f_nom_const and reference = f_reference ;
		if not found 
		then
			insert into pgi_constructeurs (nom_const,pays,reference) values (f_nom_const,f_pays,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
'
language plpgsql;