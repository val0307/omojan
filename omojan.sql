drop table taikyoku;


select * from users;
select * from taikyoku;
delete from taikyoku;

select name from users 
except 
select name from taikyoku;

select u.name from users u
left join taikyoku t
on u.name = t.name
where t.name is null


select * from huda

