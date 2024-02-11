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

### ENV Setup 
- You have to setup database related credentials properly in .env


### Migrate 
<h5>Just run this command</h5>

```bash
php artisan migrate
```

### Seeder

```bash
php artisan db:seed
```

### Update Your Composer 
```bash
composer update
```

### Testing 
If need to run test, then please run the following the command after DB Seed 

```bash
./vendor/bin/pest
```
or run individually
```bash
./vendor/bin/pest tests/Feature/LoginTest.php
./vendor/bin/pest tests/Feature/ProjectTest.php
```

### Manager Credentials 
Email: manager@gmail.com <br>
Password: manager123

### Team Members Credentials 
Email: member123@gmail.com <br>
Password: member123
or,
Email: member456@gmail.com <br>
Password: member456


### Packages
- [Laravel Pint](https://laravel.com/docs/10.x/pint)
- Default Auth
- [Artisan View](https://github.com/svenluijten/artisan-view)
- [Yajra Datatable](https://yajrabox.com/docs/laravel-datatables/10.0)
- [PEST Testing Framework](https://pestphp.com)




### Working Procedure
- When rollback first drop the Foreign keys and then others. 
- Yajra Datatable for server side rendering
- jQuery Aajx for doing all action without reload
- Sweetalert used for display success or error message 
- A member can not see other task except his.


