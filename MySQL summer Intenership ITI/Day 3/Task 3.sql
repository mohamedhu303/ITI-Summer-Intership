use student_info;

-- 1. Display the date of exam as the following: day 'month name' year.
select monthname(exam_date) as Month
from exams;



-- 2. Display the name of students with the year of birthdate.
select concat(name, "=>", birth_date) As Students
from students;



-- 3. Create hello world function which take username and return welcome message to user using his name.
DELIMITER // 
create function hello_world (username varchar(45))
returns VARCHAR(255)
deterministic 
begin 
	declare print varchar(45);
    set print = "Hello World, ";
    return concat(print, ' ', username);
end //
DELIMITER ;

select hello_world("Mohamed") hello_world;



-- 4. Create multiply function which take two number and return the multiply of them
DELIMITER //
create function add_nums(num1 int, num2 int)
returns int
deterministic 
begin 
	declare result int;
    set result = num1 * num2;
    return result;
end //
DELIMITER ;

select add_nums(12,10) result;



-- 5. Create function which takes student id and exam id and return score the student in exam.
DELIMITER //
create function exam_score(students_id int, exams_id int)
returns int 
deterministic 
begin 
	declare score int;
	select grade into score
    from stu_grades
    inner join students
		on students.id = stu_grades.stu_id
	inner join exams
		on exams.id = stu_grades.exam_id
	where exams.id = exam_id and students.id = students_id;
    return score;
end //
DELIMITER ;

select exam_score(1,3) as score;



-- 6. Create function which take subject name and return the max grade for subject.
DELIMITER // 
create function max_grade_subjects (sub_name varchar(45))
returns int 
deterministic 
begin 
	declare max_grade int;
	select max(grade) into max_grade
    from subjects
    inner join sub_grades
		on subjects.id = sub_grades.sub_id
	where subjects.name = sub_name;
	return max_grade;
end //
DELIMITER ;



-- 7. Create Table called deleted_students which will hold the deleted students’ info (same columns as in student tables)
create table deleted_students as
select * 
from students
where 1=0



-- 8. Create trigger to save the deleted student from Student table to deleted_students
DELIMITER //
create trigger before_deleted_students
before delete
on students
for each row
begin 
	insert into deleted_students
    select * 
    from students
    where id = OLD.id;
end //
DELIMITER ;



-- 9. Create trigger to save the newly added students to student table to backup_students
create table backup_students
select * 
from students
where 1=0;

DELIMITER //
create trigger after_student_insert
after insert 
on students
for each row 
begin 
	insert into backup_students
    select * 
    from students
    where 1=0;
end //
DELIMITER ;
