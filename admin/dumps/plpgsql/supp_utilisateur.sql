create or replace function supp_utilisateur(integer) 
returns integer
    
as 
'
	declare 
	  f_id_utili alias for $1;
	  id integer;
	  
	begin
	  select into id id_utili from pgi_utilisateurs where id_utili=f_id_utili;
	  if not found
	  then
		return 0;
	  else
		delete from pgi_utilisateurs where id_utili = f_id_utili;
		return 1;
	  end if;
	end;
'
language plpgsql;