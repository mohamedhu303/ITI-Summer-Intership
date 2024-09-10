-- Create database
create database student_info;

-- Use database 
use student_info;



-- student (#id, name, email, phone, *level_id)
-- level (#id, name)
-- subject (#id, name, sub_desc, max_score)
-- exam (#id, date)
-- stu_subjects (#*stu_id, #*sub_id)
-- stu_grades (#*stu_id, #*sub_id, #*exam_id, grade)



-- Create tables
create table students(
	id int primary key,
    name  varchar(45) not null,
    email varchar(45) not null,
    phone  char(11)not null,
    level_id int
);


create table levels(
	id int primary key,
    name  varchar(45) not null
);


create table subjects(
	id int primary key,
    name  varchar(45) not null,
    sub_desc text,
    max_score int
);


create table exams(
	id int primary key,
    exam_date date
);


create table stu_subjects(
	stu_id int,
    sub_id  int,
    primary key(stu_id , sub_id)
);


create table stu_grades(
	stu_id int,
    sub_id int,
    exam_id int,
    primary key(stu_id , sub_id , exam_id),
    grade int
);

    
    
    
-- a) Insert your classmates’ data (3 rows for each table)
insert into levels(id, name)
values 
(1,'first'),
(2,'second'),
(3, 'Third'),
(4, 'fourth');

insert into students(id, name, email, phone, level_id)
values 
(220, 'Mohamed Hussien', 'mohamed@gmail.com', '01113312964', 2),
(221, 'Yousef Riad' , 'yousef@gmail.com', '01224198752', 3),
(222, 'Kareem Ali', 'kareem@gmail.com', '01227426843', 3);




-- b) Add gender column for the student table. It holds two value (male or female).
-- c) Add birth date column for the student table.
Alter table students
add column gender enum('Male','Female'),
add column birth_date date;




-- d) Add foreign key constrains in your tables with options on delete cascade.
-- Relation N:M Student's level
alter table students 
add constraint student_level 
	foreign key (level_id) references levels(id)
    on delete cascade;


-- Relation M:M Student's subjects
alter table stu_subjects 
add constraint student_id_sub
	foreign key (stu_id) references students(id)
    on delete cascade,
add constraint subject_id_sub 
	foreign key (sub_id) references subjects(id)
    on delete cascade;
    
    
-- Relation M:M Student's grades
alter table stu_grades 
add constraint student_id_grade
	foreign key (stu_id) references students(id)
    on delete cascade,
add constraint subject_id_grade 
	foreign key (sub_id) references subjects(id)
    on delete cascade,
add constraint exam_id_grade
	foreign key (exam_id) references exams(id)
    on delete cascade;



-- e) Display students’ names that begin with A.
select name 
from students
where name like 'A%';



-- f) Display male students who are born before 1991-10-01.
select id, name 
from students
where gender = 'Male' and 
birth_date < '1991-10-01';