# Technology Euphoria 2023 [Techphoria Website]

Techphoria website is a platform to facilitate competition and seminar registration for Techphoria event.

This website is using CodeIgniter 4 framework, therefore a few steps is required before deploy/launch this application.

1. Device must have php, composer, and mysql/mariadb database installed and running.

2. Activate intl, mysqli, and gd extension for php.

3. Clone this repository
```git clone https://github.com/remunata/techporia23.git```

4. Open folder and install dependencies
```
cd techporia23

composer update
```

5. Create ```.env``` file by copying env file and generate private key for encryption
```
cp /env ./.env

php spark key:generate
```

6. Add your server and client key for midtrans in ```.env``` file

7. Configure database connection in ```.env``` file with username, password, and your database name, then migrate database
```
php spark migrate -all
``` 

8. Run the seeds:
```console
php spark db:seed KompetisiSeeder
```

9. Launch application
```
php spark serve
```

10. Open application in default port ```localhost:8080```