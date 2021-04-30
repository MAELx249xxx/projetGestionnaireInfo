create or replace function supp_admin(integer) 
returns integer
    
as 
'
	declare 
	  f_id_admin alias for $1;
	  id integer;
	  
	begin
	  select into id id_admin from pgi_admins where id_admin=f_id_admin;
	  if not found
	  then
		return 0;
	  else
		delete from pgi_admins where id_admin = f_id_admin;
		return 1;
	  end if;
	end;
'
language plpgsql;