# An application to manage Bookings and approvals..

### Solution Notes.

At a minimum, this solution has two different parts:

- [x] The Frontend
- [x] The Backend / Admin Interface

1. The Frontend: This is a simple html css (in form of blade) in laravel application that:
    - Allows customers / clients to create a booking.
    - The booking create form includes some form fields such as : 
        * Name (required)
        * Booking Date (required) (date-format)
        * Flexibility (options below) (required)
            - +/- 1 Day
            - +/- 2 Days
            - +/- 3 Days
        * Vehicle Size (options below) (required)
            - Small
            - Medium
            - Large
            - Van
        * Contact Number (required)
        * Email Address (required)

    - When a booking is created by the customer, the system automatically generates a booking id (in form of auto-increment number) which may be useful for the customer when the admin eventually approved the booking. The booking approval email sent to the customer will let the customer know that this specific booking with the id of {id} has been approved.


2. The Backend/Admin : The backend is also a laravel application that:
    - Gives access to the to authenticate themselves. To do this, please go to the url - (if you are running the project on laravel valet) `http://booking-system.test/admin/login` else if you are using the artisan command to run the project then that should be : `http://localhost:{port}/admin/login`. If you come across any issues, please see the Setup & Instruction section for more details about setting up the project.
    - The admin interface allows a logged-in admin to create booking (possibly on behalf of customer ?).
    - Mandating the admin to login. There are default seeders for admins to access the system and that can be found in the users table with any user with role 'admin'. However, there is a defaultAdmin state for the djValentine company with the email : `admin@djvalentinecars.com` and `password`: `password`.
    - Upon logging-in to the system, created bookings can be seen on the admin dashboard or bookings page.
    - These bookings are listed in a table with the ability of allowing the admin to modify a booking (edit), Delete a booking or approve a booking.
    - It is important to know that deleted bookings are been soft-deleted which means they can be recovered. 
    - When a booking is approved by the admin, the system notifies the customer via their email address saying that "Dear user, your booking with id {id} has now been approved." The content of this email also include further booking details such as the flexibility, vehicle size, contact number etc.
    - Admins can see approved bookings in the navbar section and can create booking using the "Create" button in the navbar section.

    

### How has this been done?

- Because I like to start with my database schemas, I started with creating the application underlying schemas and database structure. The database tables includes the `bookings` table, `flexibilities` table, `vehicle_sizes` table, `approved_bookings` table and the `users` table.
- After then, I followed the TDD approach by having some feature testing in place by testing ability to create booking as a `non-admin` user, creating a booking as an admin user, viewing all bookings as a `non-admin` user redirects the user to the log in page with a permission denied error. 
- There is a middleware responsible for bouncing a `non-admin` user back to the login route/to the home page. This middleware is called "`Admin`" and can be found in the `Middleware` folder. All user info are persisted in the users table but what separates a user(customer) from the admin is the `role` column in the `users` table.
- After completing these tests, I started creating the application logic, controllers, routes and its dedicated actions.
- I used Laravel's form requests to inject the validation into the method and I injected the models repositories into the controllers that depends on these models to work. Forexample the BookingController needs flexibility and vehicle size model to be created. So this is been injected in to the Controller's constructor.
- When a booking is saved, any admin who logs in can see this created booking with its status showing pending by default until the admin approves the booking.
- This implementation uses an action `App\Actions\CreateBooking`, `App\Actions\CreateUser`, `App\Actions\UpdateBooking`, `App\Actions\DeleteBooking` and `App\Actions\ApproveBooking` to implement the business logic.
- The repository pattern is also used in querying data from the database.
## Getting started and Tooling

Before setting up this repository, the following are the dependencies that needs to be available on your machine:

### Tooling

- [Composer] for dependency management.
- [Pest] [https://pestphp.com/docs/installation] for the test suite.
- [HTML], [CSS] and [Blade] for the frontend
- [Laravel] dependencies for the backend test suite.
- PHP (I have PHP 8.1.11 installed on my machine)


## Setup & Instruction for the backend:
1. Clone the repository: `git clone https://github.com/deendin/booking-system.git`
2. Assuming that the Dependencies listed above are satisfied, you can ```cd``` into the directory called ```booking-system.git```
4. Run `composer install` to install the project dependencies. When that is done, duplicate the content of `.env.example` into a new file called `.env` and run  `php artisan migrate --seed` to create the database tables and it's seeders.
5. In the server you can either run `php artisan serve` to start the laravel app or if you have valet setup, you can run `valet link` in this directory and then head to `http://booking-system.test` to see the application running.
6. To test, duplicate the contnet of the `.env.test.example` to a new `.env.tesing` file, run `php artisan test`, which is expected to run this tests or continue to the next step which describes how to setup the frontend.
7. *Note* Incase the test fails with an error "target class [env] not found" then you can run `php artisan optimize` and `php artisan optimize:clear`. and re-run the test suite. Also, the test uses sqlite for the database so this needs to be setup as well. `https://flaviocopes.com/sqlite-how-to-install/`


## Instruction and testing for the frontend:

1. Go to the url `http://booking-system.test` or `http://localhost:{port}` as the case may be.
2. You should automatically see the booking create page on the screen
3. Fill in this form and create a booking
4. Go to `http://booking-system.test/admin/login` to login as an admin with email : `admin@djvalentinecars.com` and `password`: `password`.
5. You should be able to see list of existing bookings (created from the seeder we run above) and the new one that's just been created from the frontend.
6. You should see three buttons/links at the front of each booking with approval action, delete and edit.
7. When you approve a booking, an email is sent to the creator (customer) of that booking with approval message and the booking details with the booking id as stated above so that they can know which of thier bookings got approved incase they have created many bookings in the past.
8. *Note* if you by any chance get an error when approving a booking, then you may need to install an email client forexample I have used `mailhog` to test emails. But this can be setup here: `https://jaymeh.co.uk/setting-up-mailhog-on-mac-with-php/`
## Example Input
<img width="1302" alt="example_input" src="https://user-images.githubusercontent.com/118926333/208005709-6b5423e2-9c91-4d3c-b422-d6933dfd4261.png">

## Example Output

<img width="1594" alt="example_output" src="https://user-images.githubusercontent.com/118926333/208005490-53db9a7f-6339-4541-8933-0414b7f667ef.png">
<img width="1594" alt="example_output" src="https://user-images.githubusercontent.com/118926333/208005493-27441b09-4519-4060-a898-445cbf85bcda.png">

## What I could have done better if I had more time (Mostly out of the task specification):

1. More tests for each feature test to test for the form validations by using a dataProvider.
2. Lint to lint the files.
3. Change the way user roles (admin and user) are been hard-coded and use `ENUM` types instead
4. Handle pagination of bookings listing on the admin dashboard/bookings page.