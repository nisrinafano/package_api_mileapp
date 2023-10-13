# Online Test MileApp

This project is made by Nisrina Fadhilah Fano as an online test for the recruitment process at MileApp as a Software Engineer.

<b>Framework: Laravel 8.83.27</b>

<b>Prequisites:</b>
- XAMPP with PHP version >= 7.3
- MongoDB Compass
- Postman

## Steps to run this project in local environment:
0. Start Apache and MySQL server
1. Clone this project inside xampp/htdocs folder
2. Copy `.env.example` file and rename the new file to `.env`
3. Create a new database in MongoDB Compass and change the value of `DB_DATABASE` with your database name
4. Create a new collection `package`
5. Open terminal, navigate to this project folder
6. Run `php artisan migrate` to create the table
7. Run `php artisan serve` to start
8. Now you're ready to test the REST API with Postman. Here's the detail:
    - [GET] /api/package
    - [GET] /api/package/{id}
    - [POST] /api/package
        - Headers:
            - Accept: 'application/json'
        - For the parameter can use the data in package_data.json
    - [PUT] /api/package/{id}
        - Headers:
            - Accept: 'application/json'
        - For the parameter can use the data in package_data.json
    - [PATCH] /api/package/{id}
        - Headers:
            - Accept: 'application/json'
        - For the parameter can use all or partial of the data in package_data.json
    - [DELETE] /api/package/{id}
9. To test using unit test, run `php artisan test`
10. Can access Swagger UI in http://localhost:8000/api/documentation