create or replace function ajout_admin(text,text,text)
returns integer
as
'
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare f_reference alias for $3;
	declare retour integer;
	declare id integer;

	begin
		select into id id_admin from pgi_admins where login = f_login and reference = f_reference ;
		if not found 
		then
			insert into pgi_admins (login,password,reference) values (f_login,f_password,f_reference);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
'
language plpgsql;