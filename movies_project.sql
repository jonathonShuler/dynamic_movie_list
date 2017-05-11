
create database if not exists `movies_project`;

drop table if exists `user`;
create table `user`(
	`user_id` int unsigned not null auto_increment,
	`username` varchar(64) not null,
	`password` varchar(64) not null,
	constraint `user_pk` primary key(`user_id`)
);

drop table if exists `movie`;
create table `movie`(
	`movie_id` int unsigned not null auto_increment,
	`title` varchar(64) not null,
	`genre` varchar(64),
	`mpaa` varchar(64),
	`imdb` varchar(64),
	`metacritic` varchar(64),
	`top_actress` varchar(64),
	`top_actor` varchar(64),
	`release_date` varchar(64),
	`run_time` varchar(64),
	`director` varchar(64),
	`usa_gross` varchar(64),
	`image_url` text,
	constraint `movie_pk` primary key(`movie_id`)
);

insert into `user` values(null, 'Movie', '28f20b58ab4ca98b93fa1a74dc9b46ed');

insert into `movie` values(null,'Edge of Tomorrow',' Action, Adventure, Sci-Fi','PG-13','7.9/10','71/100','Emily Blunt','Tom Cruise',' 6 June 2014','113 min','Doug Liman','$100,189,501','https://images-na.ssl-images-amazon.com/images/M/MV5BMTc5OTk4MTM3M15BMl5BanBnXkFtZTgwODcxNjg3MDE@._V1_UX182_CR0,0,182,268_AL_.jpg');
insert into `movie` values(null,'Star Wars: The Force Awakens','Action, Adventure, Fantasy ','PG-13','8.2/10','81/100','Daisy Ridley','John Boyega','18 December 2015','136 min','J.J. Abrams','$936,627,416','https://images-na.ssl-images-amazon.com/images/M/MV5BOTAzODEzNDAzMl5BMl5BanBnXkFtZTgwMDU1MTgzNzE@._V1_SY317_CR0,0,214,317_AL_.jpg');
insert into `movie` values(null,'Guardians of the Galaxy','Action, Adventure, Sci-Fi','PG-13','8.1/10','76/100','Zoe Saldana','Chris Pratt','1 August 2014','121 min','James Gunn','$333,130,696','https://images-na.ssl-images-amazon.com/images/M/MV5BMTAwMjU5OTgxNjZeQTJeQWpwZ15BbWU4MDUxNDYxODEx._V1_UX182_CR0,0,182,268_AL_.jpg');
insert into `movie` values(null,'Aladdin',' Animation, Adventure, Comedy','G','8.0/10','N/A','Linda Larkin','Scott Weinger','25 November 1992','90 min','Ron Clements, John Musker','$217,350,219','https://images-na.ssl-images-amazon.com/images/M/MV5BY2Q2NDI1MjUtM2Q5ZS00MTFlLWJiYWEtNTZmNjQ3OGJkZDgxXkEyXkFqcGdeQXVyNTI4MjkwNjA@._V1_UX182_CR0,0,182,268_AL_.jpg');
insert into `movie` values(null,'Ant-Man',' Action, Adventure, Comedy','PG-13','7.4/10','64/100','Evangeline Lilly','Paul Rudd','17 July 2015','117 min','Peyton Reed','$180,191,634','https://images-na.ssl-images-amazon.com/images/M/MV5BMjM2NTQ5Mzc2M15BMl5BanBnXkFtZTgwNTcxMDI2NTE@._V1_UX182_CR0,0,182,268_AL_.jpg');
insert into `movie` values(null,'Patriot Games',' Action, Thriller','R','6.9/10','N/A','Anne Archer','Harrison Ford',' 5 June 1992','117 min','Phillip Noyce','$83,287,363','https://images-na.ssl-images-amazon.com/images/M/MV5BMjA3OTA0NjI0Nl5BMl5BanBnXkFtZTgwNjUwODQxMTE@._V1_UX182_CR0,0,182,268_AL_.jpg');
insert into `movie` values(null,'Terminator 2: Judgement Day','Action, Sci-Fi','R','8.5/10','75/100','Linda Hamilton','	Arnold Schwarzenegger',' 3 July 1991','137 min','James Cameron','$204,843,350','https://images-na.ssl-images-amazon.com/images/M/MV5BZDM2YjYwYWMtMWZlNi00ZDQxLWExMDctMDAzNzQ0OTkzZjljXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_UX182_CR0,0,182,268_AL_.jpg');
insert into `movie` values(null,'Inception','Action, Adventure, Sci-Fi','PG-13','8.8/10','74/100','Ellen Page','Leonardo DiCaprio','16 July 2010','148 min','Christopher Nolan','$292,568,851','https://images-na.ssl-images-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_UX182_CR0,0,182,268_AL_.jpg');
insert into `movie` values(null,'Mad Max: Fury Road',' Action, Adventure, Sci-Fi','R','8.1/10','90/100','Charlize Theron','Tom Hardy','15 May 2015','120 min','George Miller','$153,629,485','https://images-na.ssl-images-amazon.com/images/M/MV5BMTUyMTE0ODcxNF5BMl5BanBnXkFtZTgwODE4NDQzNTE@._V1_UY268_CR1,0,182,268_AL_.jpg');
insert into `movie` values(null,'Jurassic Park','Adventure, Sci-Fi, Thriller','PG-13','8.1/10','68/100','Laura Dern','Sam Neill','11 June 1993','127 min','Steven Spielberg','$356,784,000','https://images-na.ssl-images-amazon.com/images/M/MV5BMjM2MDgxMDg0Nl5BMl5BanBnXkFtZTgwNTM2OTM5NDE@._V1_UX182_CR0,0,182,268_AL_.jpg');

