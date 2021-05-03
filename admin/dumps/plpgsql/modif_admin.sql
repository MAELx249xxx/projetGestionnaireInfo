create or replace function modif_admin(integer, text,text,text) 
returns integer
    
as 
'
	declare 
	  f_id_admin alias for $1;
	  f_login alias for $2;
	  f_password alias for $3;
	  f_reference alias for $4;
	  id integer;
	  
	begin
	  select into id id_admin from pgi_admins where id_admin=f_id_admin;
	  if not found
	  then
		return 0;
	  else
		update pgi_admins set login=f_login, password=f_password, reference=f_reference where id_admin=id;
		return 1;
	  end if;
	end;
'
language plpgsql;
