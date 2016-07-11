## Outbreak detection protocols

Website containing protocols that can be used during outbreak detection.

###Installation
1. Clone the repository using `git clone https://github.com/bvbunnik/protocols.git`. This will clone it into the directory `protocols`.
2. Run the following setup commands:
  1. `composer install`
  2. `npm install`
  3. Create .env file (.env.example included)
  4. `php install key:generate`
  5. `php artisan migrate`
  6. Set administrator info in `database/seeds/Access/UserTableSeeder.php`
  7. `php artisan db:seed`
  8. run `gulp`
  9. Import the csv-files under `protocols` in the mysql-database (tables and files have the same name) using (for example): `mysqlimport -hhostaddress-uusername -p --columns=\`head -n 1 ./protocols/tablename.csv\` --ignore-lines=1 protocols ./protocols/tablename.csv -L --fields-terminated-by=',' --field-optionally-enclosed-by='"'`

###License
MIT: [http://anthony.mit-license.org](http://anthony.mit-license.org)