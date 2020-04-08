Application structre:
 
 there is two typs of users: employees and admins.

 the user(admin or employee) can visit login page by visiting localhost:8000.
 in order to be able to login the use must have account ,
 	created by an admin.

  After login in the admin have the following links for pages:

 1)Add New Employee: in order to be able to login the user must have account ,
 	created by an admin in localhost:8000/signup page only accessable by admins.

 2)Show Employee: list page of only employees 
 	,admin can edit employee data or delete current employees 
 	,tasks associated are also deleted in the process>

 3)New Task: the admin assign a task for the employee using his id>

 4)employees Rating: shows the number of finished tasks for employees with one task finished at least in the last week from the current date.

 After login in the employee have the following links for pages:
 
 1)Tasks: the employee view current tasks assigned to him and pick the date to accomplish them.

