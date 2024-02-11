<div align='center'>

# Task Management System 

</div>

## About
The `Task Management System` is a web-based application developed for `Business Automation Ltd`.

Please refer to the system requirements details given below, which I have attempted to follow:

#### - Authentication and Authorization :
There are two types of users: Managers and Teammates. Managers can sign up using their Email, Name, Employee ID, and Password. They can also create Teammates who can then log in. Managers have access to all features, whereas Teammates have some limitations. A member can only access their assigned data. However, they cannot view tasks assigned to other members. <br>
Managers can access: Team management, Project management, and Task management. <br>
Teammates can access: They can only view their task list, filter it, and update the status.


#### - Project Management :
Managers can create Projects, each with a unique code and name. They can also create Tasks, which include task name, project code, description, and status.

#### - Task and Status Management :
Managers can assign tasks to teammates, and teammates, upon logging in, can view their assigned tasks and update their status.

#### - Search and Filter functionality:
For the search functionality, there is a datatable named `Yajra` where any word can be easily searched.
Additionally, there is a filter option where Managers and Teammates can filter tasks based on Project and status. Managers can also filter projects according to project name.

## How to run this project ?

#### Database Schema
[Click Here](https://drawsql.app/teams/irfan-chy/diagrams/task-management-system)


#### Technology Used
- PHP - 8.1
- Laravel- 10
- MySQL - 8
- Bootstrap - 4
- jQuery, Ajax


#### Update Your Composer 
```bash
composer update
```


#### ENV Setup 
- Just copy paste your existing .env.example to .env
- You have to setup database related credentials properly in .env


#### Generate APP_KEY
```bash
php artisan key:generate
```

#### Migrate 
Just run this command

```bash
php artisan migrate
```

#### Seeder

```bash
php artisan db:seed
```

#### Run Project 
```bash
php artisan serve
```

#### Testing 
If need to run test, then please run the following the command after DB Seed 

```bash
./vendor/bin/pest
```
or run individually
```bash
./vendor/bin/pest tests/Feature/LoginTest.php
./vendor/bin/pest tests/Feature/TeamMemberTest.php
./vendor/bin/pest tests/Feature/ProjectTest.php
./vendor/bin/pest tests/Feature/TaskTest.php
```

You can check my Feature test result : [Click Here](https://snipboard.io/ZMrwu4.jpg)


#### Manager Credentials 
```bash
url: your_domain/login
Email: manager@gmail.com 
Password: manager123
```


#### Team Members Credentials 
```bash
url: your_domain/member-login
Email: member123@gmail.com 
Password: member123
```

or,
```bash
url: your_domain/member-login
Email: member456@gmail.com 
Password: member456
```

or goto direct your_domain. There are two options.


## Decisions made during task completion
- When rolling back, first drop the foreign keys, and then other constraints. 
- For code clean and formatting, I used Laravel Pint.
- Yajra Datatable used for server-side rendering.
- jQuery Ajax was used for performing actions without reloading the page.
- Sweetalert was used to display success or error messages.
- A member can only view their own tasks.
- I tried to write some test code using the PEST Testing Framework. Currently, I've only written some feature test codes.
- A member can access only their assigned data. However, they cannot view tasks assigned to other members. Managers have access to all tasks.
- I separated the data layer and business logic from the controller to facilitate method reusability and parallel testing. 
- Implement error handling using `try..catch`. When multiple data operations are performed, I followed the transaction mechanism. If successful, the transaction is committed; otherwise, it is rolled back (Used transaction in "Task" operations). 



### Packages which I used
- [Laravel Pint](https://laravel.com/docs/10.x/pint)
- Default Auth
- [Artisan View](https://github.com/svenluijten/artisan-view)
- [Yajra Datatable](https://yajrabox.com/docs/laravel-datatables/10.0)
- [PEST Testing Framework](https://pestphp.com)



