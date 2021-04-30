create or replace function is_uti(text, text) returns integer
as
'
	declare f_login alias for $1;
	declare f_password alias for $2;
	declare id integer;
	declare retour integer;	
begin
	select into id id_utili from pgi_utilisateurs where login = f_login and password = f_password;
	if not found
	then
		retour = 0;
	else
		retour = 1;
	end if;
	return retour;
end;
'
language plpgsql;