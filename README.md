<div align='center'>

# Task Management System 

</div>

### Database Schema
#### [Click Here](https://drawsql.app/teams/irfan-chy/diagrams/task-management-system)

## How to run this project

### Requirements
- PHP - 8.1
- Laravel- 10
- MySQL - 8


### Update Your Composer 
```bash
composer update
```


### ENV Setup 
- Just copy paste your existing .env.example to .env
- You have to setup database related credentials properly in .env


### Generate APP_KEY
```bash
php artisan key:generate
```

### Migrate 
<h5>Just run this command</h5>

```bash
php artisan migrate
```

### Seeder

```bash
php artisan db:seed
```

### Run Project 
```bash
php artisan serve
```

### Testing 
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


### Manager Credentials 
```bash
Email: manager@gmail.com 
Password: manager123
```


### Team Members Credentials 
```bash
Email: member123@gmail.com 
Password: member123
```

or,
```bash
Email: member456@gmail.com 
Password: member456
```


### Packages which I installed
- [Laravel Pint](https://laravel.com/docs/10.x/pint)
- Default Auth
- [Artisan View](https://github.com/svenluijten/artisan-view)
- [Yajra Datatable](https://yajrabox.com/docs/laravel-datatables/10.0)
- [PEST Testing Framework](https://pestphp.com)



## Decisions while completing the task
- When rollback first drop the Foreign keys and then others. 
- Yajra Datatable for server side rendering
- jQuery Aajx for doing all action without reload
- Sweetalert used for display success or error message 
- A member can not see other task except his.
- Tried to write some tests code using PEST Testing Framework. Right now I just wrote some features test codes.
- A member can only see his data which he task assigned. But he can not access other member task. Only Manager can do all. 


