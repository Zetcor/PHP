<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $country = $_POST['country'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (!preg_match("/^[A-Za-z ]{2,50}$/", $fullname)) {
        $errors[] = "Invalid full name.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    $birthdate = new DateTime($birthday);
    $today = new DateTime();
    $age = $today->diff($birthdate)->y;
    if ($age < 18) {
        $errors[] = "You must be at least 18 years old.";
    }

    if (!preg_match("/^09\d{9}$/", $phone)) {
        $errors[] = "Phone number must start with 09 and be 11 digits.";
    }

    if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/", $email)) {
        $errors[] = "Invalid email address.";
    }

    if (!preg_match("/^[\w\s.,#-]{5,100}$/", $street)) {
        $errors[] = "Invalid street address.";
    }

    if (!preg_match("/^[A-Za-z ]{2,50}$/", $city)) {
        $errors[] = "Invalid city name.";
    }

    if (!preg_match("/^[A-Za-z ]{2,50}$/", $province)) {
        $errors[] = "Invalid province/state name.";
    }

    if (!preg_match("/^\d{4}$/", $zipcode)) {
        $errors[] = "Zip code must be exactly 4 digits.";
    }

    if (!preg_match("/^[A-Za-z ]+$/", $country)) {
        $errors[] = "Invalid country name.";
    }

    if (!preg_match("/^\w{5,20}$/", $username)) {
        $errors[] = "Username must be 5–20 characters with letters, numbers, or underscores.";
    }

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters with uppercase, lowercase, number, and special character.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (!empty($errors)) {
        $alert = implode("\n", $errors);
        echo "<script>alert('$alert'); window.history.back();</script>";
        exit;
    } else {
        $line = implode("|", [
            $fullname,
            $gender,
            $birthday,
            $phone,
            $email,
            $street,
            $city,
            $province,
            $zipcode,
            $country,
            $username,
            $password
        ]) . "\n";

        file_put_contents("users.txt", $line, FILE_APPEND);

        $_SESSION['user'] = [
            'fullname' => $fullname,
            'gender' => $gender,
            'birthday' => $birthday,
            'phone' => $phone,
            'email' => $email,
            'street' => $street,
            'city' => $city,
            'province' => $province,
            'zipcode' => $zipcode,
            'country' => $country,
            'username' => $username,
            'password' => $password,
            'confirm_password' => $confirm_password
        ];

        echo "<script>alert('Registration successful! Redirecting...');window.location.href='welcome.php';</script>";
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Libre Baskerville' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/022cf77951.js" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Register</title>

    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #E7ECEF;
            font-family: 'Roboto';
            height: 100vh;
        }

        h1,
        h5 {
            font-family: 'Libre Baskerville';
            color: #0F1E2E;
        }

        h2 {
            font-family: 'Libre Baskerville';
        }

        h5 {
            font-family: 'Libre Baskerville';
            color: #E7ECEF;
        }

        .create_account_button {
            background-color: #274C77;
            color: #E7ECEF
        }

        .create_account_button:hover {
            background-color: #1E3A5F;
            color: #E7ECEF
        }

        .main-footer p {
            font-family: 'Roboto';
            color: #E7ECEF;
        }

        p {
            font-family: 'Roboto';
            color: #0F1E2E;
        }

        .main-nav {
            background-color: #274C77;
            font-family: 'Segoe UI', sans-serif;
            padding: 0.5rem 1rem;
        }

        .navbar-nav .nav-link,
        .login-button {
            font-size: 1.2rem;
        }

        .custom-toggler {
            color: #E7ECEF;
            font-size: 1.5rem;
            border: none;
            background: transparent;
            margin-right: 1rem;
        }

        .custom-toggler:hover {
            color: #A3CEF1;
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
            border: none;
        }

        @media (max-width: 575.98px) {
            #navbarNav {
                text-align: center;
            }

            #navbarNav .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            #navbarNav .nav-item {
                width: 100%;
            }

            #navbarNav .nav-link {
                display: block;
                width: 100%;
            }
        }

        .login-button {
            color: #E7ECEF;
            font-weight: 600;
            text-decoration: none;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            margin-right: 1rem;
            border-bottom: 2px solid transparent;
        }

        .login-button:hover {
            background-color: #A3CEF1;
            color: #274C77;
            border-bottom-color: transparent;
        }

        .navbar-nav .nav-link {
            color: #E7ECEF;
            font-weight: 600;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            display: inline-block;
            margin-right: 1rem;
        }

        .navbar-nav .nav-link:hover {
            background-color: #A3CEF1;
            color: #274C77;
            border-bottom-color: transparent;
        }

        .navbar-nav .nav-link.active {
            color: #E7ECEF;
            border-bottom-color: #E7ECEF;
        }

        .navbar-nav .nav-link.active:hover {
            background-color: #A3CEF1;
            color: #274C77;
            border-bottom-color: transparent;
        }

        .main-footer {
            background-color: #274C77;
            color: #E7ECEF;
        }

        .footer-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #E7ECEF;
            text-decoration: none;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light main-nav">
        <div class="container-fluid">

            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                <ul class="navbar-nav gap-2 pe-3">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">
                            <i class="fa-solid fa-house-chimney"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-briefcase"></i> What We Offer
                        </a>
                    </li>
                </ul>
            </div>

            <a class="navbar-brand login-button" href="#"><i class="fa-solid fa-user"></i> Login</a>

        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow-lg rounded p-4 bg-light">
            <h1 class="text-center">REGISTRATION</h1>
            <form action="registration.php" method="POST">
                <h2>Personal Information</h2>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="">Select your gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
                </div>

                <hr class="my-4">

                <h2 class="mt-4">Address Details</h2>
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" placeholder="Enter your street address">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">Province/State</label>
                    <input type="text" class="form-control" id="province" name="province" placeholder="Enter your province or state">
                </div>
                <div class="mb-3">
                    <label for="zipcode" class="form-label">Zip Code</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter your zipcode">
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country">
                </div>

                <hr class="my-4">

                <h2 class="mt-4">Account Details</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter your password">
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="button" class="btn btn-secondary w-100">Clear</button>
                    <button type="submit" class="btn create_account_button w-100">Create Account</button>
                </div>


                <p class="mt-3 text-start">
                    <small>Already have an account? <a href="login.php" class="text-decoration-none">Login here</a></small>
                </p>

        </div>
        </form>

    </div>
    </div>

    <footer class="main-footer mt-5 pt-5 p-1">
        <div class="container py-4 text-center">
            <div class="row justify-content-center">

                <div class="col-md-4 mb-3">
                    <p class="footer-title">© 2025 Vince Nicholai J. Cortez. <br> All rights reserved.</p>
                    <p class="footer-links">
                        <a href="#">Privacy Policy</a> |
                        <a href="#">Terms of Service</a> |
                        <a href="#">Contact</a>
                    </p>
                </div>

            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>

</html>