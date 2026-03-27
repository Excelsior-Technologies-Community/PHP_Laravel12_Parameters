# 📥 Laravel 12 Parameter Project

A simple **Laravel 12 project** that demonstrates how to use **Route Parameters** and display dynamic data in a **Blade View** with a clean design.

This project helps beginners understand how parameters work in Laravel routes and how data can be passed from a **Controller to a Blade template**.

---

# 🛠️ Tech Stack

| Technology | Version                               |
| ---------- | ------------------------------------- |
| Framework  | Laravel 12.x                          |
| PHP        | 8.2+                                  |
| Frontend   | Blade Templating Engine + Custom CSS3 |
| Server     | Apache (XAMPP)                        |
| Database   | MySQL                                 |

---

# 🚀 Installation Steps

Follow the steps below to run the project locally.

## 1️⃣ Create or Clone Project

```bash
composer create-project laravel/laravel my-parameter-app
cd my-parameter-app
```

---

## 2️⃣ Database Configuration

Open the **`.env`** file and configure your database.

Create a database named:

```
parameter
```

Then update `.env`:

```
DB_DATABASE=parameter
DB_USERNAME=root
DB_PASSWORD=
```

---

## 3️⃣ Run Migrations

```bash
php artisan migrate
```

---

## 4️⃣ Run Development Server

```bash
php artisan serve
```

Now open in browser:

```
http://127.0.0.1:8000
```

---

# 📂 Project Structure & Code

## 1️⃣ Routes

📄 `routes/web.php`

Here we define a **route with a parameter**.

```php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route with optional parameter
Route::get('/profile/{name?}', [UserController::class, 'getProfile']);
```

---

## 2️⃣ Controller

📄 `app/Http/Controllers/UserController.php`

The controller receives the parameter and passes it to the Blade view.

```php
namespace App\Http\Controllers;

class UserController extends Controller
{
    public function getProfile($name = "Guest")
    {
        return view('user_profile', ['userName' => $name]);
    }
}
```

---

## 3️⃣ Blade View

📄 `resources/views/user_profile.blade.php`

The Blade template displays dynamic data using:

```
{{ $userName }}
```

This value is passed from the controller.

---

# 🔗 Testing Links

After running the server, test these URLs in the browser.

### Default Profile

```
http://127.0.0.1:8000/profile
```

### Profile with Name

```
http://127.0.0.1:8000/profile/Manav
```

### Another Example

```
http://127.0.0.1:8000/profile/Sanchela
```

---

# 📝 Key Notes

### ⚠️ Database Error

If you get an **Unknown Database error**, verify the database name in your `.env` file.

---

### 🎨 CSS Not Loading

Run the following command:

```bash
php artisan view:clear
```

This clears cached views and reloads the latest design.

---

# 📚 Learning Outcome

From this project you will learn:

* Laravel Route Parameters
* Optional Route Parameters
* Controller to View Data Passing
* Blade Template Variables
* Basic Laravel Project Structure

---


# Output
<img width="1290" height="571" alt="image" src="https://github.com/user-attachments/assets/a4a56767-08ae-4069-a96c-03aff60fbdf9" />

