use student_info;

-- 1. Display the subject with highest max score
select *
from subjects
order by max_score desc
limit 1;



-- 2.Write a query to display students’ names with their subject's names which will study.
select students.name Student_name, subjects.name Subject_name
from students
inner join stu_subjects
	on students.id = stu_subjects.stu_id
inner join subjects
	on stu_subjects.sub_id = subjects.id;
    
    

-- 3.Write a query to display students’ names, their score and subject name
select students.name Student_name, subjects.name Subject_name, stu_grades.grade Grade
from stu_grades
right join students
	on students.id = stu_grades.stu_id
inner join subjects
	on  subjects.id = stu_grades.sub_id;
    


-- 4. Display the IDs of students who did not take any exam (with / without subquery).
-- With subquery
select id 
from students 
where id in (
	select id 
	from exams
    where exam_date is null
);

-- Without subquery
select id 
from students
left join stu_grades
on students.id = stu_grades.sub_id 
where stu_grades.sub_id is null;



-- 5. Delete students whose score is lower than 50 in any subject.
delete from students
where id in (
select grade
from stu_grades
where grade < 50); 
