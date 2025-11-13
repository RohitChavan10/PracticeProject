CRUD Dashboard
1. **Clone the repository**
   ```bash
   git clone https://github.com/RohitChavan10/PracticeProject.git
   cd PracticeProject
   
2.Install PHP dependencies
composer install   

3.Install frontend dependencies
npm install

4.Create environment file
cp .env.example .env

5.cp .env.example .env
Set your database credentials in .env:
env
Copy code
DB_DATABASE=PracticeProject
DB_USERNAME=root
DB_PASSWORD=

6.Run migrations
php artisan migrate

7.Run the dev servers
php artisan serve
npm run dev
Open: http://localhost:8000/records.
