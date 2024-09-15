# PHP 8.3 MVC CRUD Application with SQLite

This is a simple CRUD (Create, Read, Update, Delete) application built with PHP 8.3, using the MVC (Model-View-Controller) design pattern. The application manages contacts with fields for **Name**, **Email**, and **Phone**. Data is stored locally using a SQLite database. The interface is designed to be responsive, lightweight, and user-friendly, featuring a dark theme for improved user experience.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Running the Application](#running-the-application)
- [Notes](#notes)
- [License](#license)

## Features

- **CRUD Operations**: Create, read, update, and delete contacts.
- **Responsive Design**: Interface adapts to various screen sizes.
- **Dark Theme Interface**: Improved aesthetics and user experience with a dark theme.
- **Lightweight and Fast**: Minimal dependencies and efficient code.
- **No Apache Required**: Uses PHP's built-in web server for simplicity.

## Technologies Used

- **PHP 8.3**
- **SQLite** (via PDO)
- **HTML5/CSS3**
- **MVC Design Pattern**

## Project Structure

```
- index.php
- controllers/
    - ContactController.php
- models/
    - ContactModel.php
- views/
    - index.php
    - create.php
    - edit.php
```

- **index.php**: The front controller handling all incoming requests and routing.
- **controllers/**: Contains the controller(s) that handle user input and interactions.
- **models/**: Contains the model(s) that interact with the database.
- **views/**: Contains the view files that display the user interface.

## Installation

1. **Clone the Repository**

   ```bash
   git clone git@github.com:Jaelcio-de-Araujo/crudPHP.git
   cd crudPHP
   ```

2. **Ensure PHP 8.3 is Installed**

   Verify that PHP 8.3 or higher is installed on your system:

   ```bash
   php -v
   ```

   If not installed, download it from the [official PHP website](https://www.php.net/downloads.php).

3. **Set Permissions**

   Ensure the project directory has read/write permissions so that the SQLite database can be created and modified.

   ```bash
   chmod -R 755 /path/to/your/project
   ```

## Usage

### Running the Application

Since this application doesn't rely on Apache, you can use PHP's built-in web server to run it:

```bash
php -S localhost:8000
```

This command should be run in the root directory of the project (where `index.php` is located).

### Accessing the Application

Open your web browser and navigate to:

```
http://localhost:8000
```

### Application Workflow

- **Home Page (Contact List):**

  - Displays a list of all contacts.
  - Options to add a new contact, edit, or delete existing ones.

- **Add New Contact:**

  - Click on the "Add New Contact" button.
  - Fill in the form fields: Name, Email, and Phone.
  - Submit the form to save the contact.

- **Edit Contact:**

  - Click on the "Edit" button next to a contact.
  - Update the desired fields.
  - Submit the form to save changes.

- **Delete Contact:**

  - Click on the "Delete" button next to a contact.
  - Confirm the deletion when prompted.

## Running the Application

1. **Start the PHP Built-in Server**

   Navigate to the project directory and run:

   ```bash
   php -S localhost:8000
   ```

2. **Open in Browser**

   Visit `http://localhost:8000` in your web browser to access the application.

## Notes

- **Database File Location:** The SQLite database file (`database.sqlite`) will be created automatically in the root directory upon first use.

- **Security Considerations:**

  - Prepared statements are used to prevent SQL injection.
  - `htmlspecialchars` is used in views to prevent XSS attacks.

- **Customization:**

  - **Styles:** The CSS is embedded within the view files for simplicity. For better maintainability, consider moving styles to separate CSS files.
  - **Database Path:** If you wish to store the database file elsewhere, update the PDO connection string in `models/ContactModel.php`.

- **Error Handling:**

  - For simplicity, basic error handling is implemented.
  - For production use, consider adding comprehensive error handling and validation.

## How It Works

### Routing Without Apache

The `index.php` file serves as the front controller and handles all routing logic. It uses PHP's `$_SERVER['REQUEST_URI']` to parse the incoming URL and directs the request to the appropriate controller action.

### MVC Components

- **Model (`ContactModel.php`):** Handles all database interactions using PDO with SQLite.
- **View (`*.php` in `views/` folder):** Contains the HTML and embedded PHP to display data to the user.
- **Controller (`ContactController.php`):** Processes user input, interacts with the model, and loads the appropriate view.

### Database Creation

The database is created automatically when the application is first run. The `ContactModel`'s constructor checks if the `contacts` table exists and creates it if it doesn't.

```php
public function __construct() {
    $this->db = new PDO('sqlite:database.sqlite');
    $this->createTable();
}

private function createTable() {
    $this->db->exec("CREATE TABLE IF NOT EXISTS contacts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        email TEXT,
        phone TEXT
    )");
}
```

## License

This project is open-source and available under the [MIT License](LICENSE).

---

Feel free to contribute to this project by submitting issues or pull requests.

---

## Contact

For any inquiries or feedback, please contact [jaelcio@jaelcio.com.br](mailto:your-email@example.com).

---

**Disclaimer:** This project is intended for educational purposes to demonstrate a basic PHP MVC application without the need for a full-fledged web server like Apache or Nginx.