create or replace function ajout_utili(text,text,text,text,text,integer,text,text)
returns integer
as
'
	declare f_nom_utili alias for $1;
	declare f_prenom alias for $2;
	declare f_login alias for $3;
	declare f_password alias for $4;
	declare f_rue alias for $5;
	declare f_num alias for $6;
	declare f_pays alias for $7;
	declare f_ville alias for $8;
	declare retour integer;
	declare id integer;

	begin
		select into id id_utili from pgi_utilisateurs where login = f_login;
		if not found 
		then
			insert into pgi_utilisateurs (nom_utili,prenom,login,password,rue,num,pays,ville) values (f_nom_utili,f_prenom,f_login,f_password,f_rue,f_num,f_pays,f_ville);
			retour = 1;
		else
			retour = 0;
		end if;
		return retour;
	end
'
language plpgsql;