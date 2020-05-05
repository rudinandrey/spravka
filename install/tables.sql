create table spravka (
  id serial primary key,
  city int not null,
  phone varchar(50) not null,
  name varchar(250) not null,
  owner varchar(250) not null,
  address varchar(250) not null,
  info varchar(250) not null,
  is_visible int not null default 1,
  is_company int not null default 0,
  key c(city),
  key key_phone(phone),
  key key_name(name),
  key key_owner(owner),
  key key_address(address)
);