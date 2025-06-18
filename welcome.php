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
    <title>Homepage</title>

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

        h5 {
            font-family: 'Libre Baskerville';
            color: #E7ECEF;
        }

        .signin_button {
            background-color: #274C77;
            color: #E7ECEF
        }

        .signin_button:hover {
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

            <a class="navbar-brand login-button mt-2" href="#"><i class="fa-solid fa-user"></i> Login</a>

        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow-lg rounded p-4">
            <h2 class="text-center mb-4">Submitted Information</h2>

            <h4>Personal Information</h4>
            <p><strong>Full Name:</strong> <?= htmlspecialchars($_POST['fullname']) ?></p>
            <p><strong>Gender:</strong> <?= htmlspecialchars($_POST['gender']) ?></p>
            <p><strong>Date of Birth:</strong> <?= htmlspecialchars($_POST['birthday']) ?></p>
            <p><strong>Phone Number:</strong> <?= htmlspecialchars($_POST['phone']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($_POST['email']) ?></p>

            <hr>

            <h4>Address Details</h4>
            <p><strong>Street:</strong> <?= htmlspecialchars($_POST['street']) ?></p>
            <p><strong>City:</strong> <?= htmlspecialchars($_POST['city']) ?></p>
            <p><strong>Province:</strong> <?= htmlspecialchars($_POST['province']) ?></p>
            <p><strong>Zip Code:</strong> <?= htmlspecialchars($_POST['zipcode']) ?></p>
            <p><strong>Country:</strong> <?= htmlspecialchars($_POST['country']) ?></p>

            <hr>

            <h4>Account Details</h4>
            <p><strong>Username:</strong> <?= htmlspecialchars($_POST['username']) ?></p>
            <p><strong>Password:</strong> <?= str_repeat('*', strlen($_POST['password'])) ?></p>
            <p><strong>Confirm Password:</strong> <?= str_repeat('*', strlen($_POST['confirm_password'])) ?></p>

            <div class="d-flex mt-4 justify-content-end">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>

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