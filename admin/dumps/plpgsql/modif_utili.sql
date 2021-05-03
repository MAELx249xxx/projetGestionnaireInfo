create or replace function modif_utili(integer, text,text,text,text,text,integer,text,text) 
returns integer
    
as 
'
	declare 
	  f_id_utili alias for $1;
	  f_nom_utili alias for $2;
	  f_prenom alias for $3;
	  f_login alias for $4;
	  f_password alias for $5;
	  f_rue alias for $6;
	  f_num alias for $7;
	  f_pays alias for $8;
	  f_ville alias for $9;
	  id integer;
	  
	begin
	  select into id id_utili from pgi_utilisateurs where id_utili=f_id_utili;
	  if not found
	  then
		return 0;
	  else
		update pgi_utilisateurs set nom_utili=f_nom_utili, prenom=f_prenom,login=f_login,password=f_password,rue=f_rue, num=f_num, pays=f_pays, ville=f_ville where id_utili=id;
		return 1;
	  end if;
	end;
'
language plpgsql;
