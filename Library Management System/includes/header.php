<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #3498db;
            --dark-blue: #2980b9;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        /* Enhanced Header Styles */
        .navbar {
            min-height: 90px;
            margin-bottom: 0;
            padding: 1rem 0;
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue)) !important;
            color: var(--white);
            box-shadow: var(--shadow);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            margin-left: 2rem;
        }

        .navbar-brand img {
            height: 60px;
            filter: brightness(0) invert(1);
            margin-right: 1rem;
        }

        .system-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white);
            margin: 0;
        }

        .right-div {
            margin-right: 2rem;
        }

        .logout-btn {
            background-color: var(--white);
            color: var(--primary-blue);
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Enhanced Navigation Styles */
        .menu-section {
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 1rem 0;
            border-bottom: 3px solid var(--primary-blue);
        }

        .nav-container {
            display: flex;
            justify-content: center;
        }

        .navbar-nav {
            gap: 0.5rem;
        }

        .nav-link {
            color: var(--dark-gray);
            padding: 1rem 1.5rem;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.8rem;
            text-transform: uppercase;
        }

        .nav-link:hover, 
        .nav-link.active {
            background-color: var(--primary-blue);
            color: var(--white) !important;
        }

        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: var(--shadow);
            padding: 0.8rem 0;
            min-width: 220px;
        }

        .dropdown-item {
            padding: 0.8rem 1.8rem;
            font-size: 1rem;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background-color: var(--light-gray);
            color: var(--primary-blue) !important;
        }

        /* Guest Menu Styles */
        .guest-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 1rem;
            justify-content: flex-end;
        }

        .guest-menu a {
            color: var(--dark-gray);
            padding: 0.8rem 1.5rem;
            text-decoration: none;
            font-weight: 500;
            border-radius: 30px;
            transition: var(--transition);
        }

        .guest-menu a:hover {
            background-color: var(--primary-blue);
            color: var(--white) !important;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .navbar-brand {
                margin-left: 1rem;
            }
            
            .system-title {
                font-size: 1.5rem;
            }
            
            .navbar-nav, .guest-menu {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .nav-link, .guest-menu a {
                padding: 0.8rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER SECTION -->
    <div class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/img/logo.png" alt="Library Logo">
                <span class="system-title">Online Library Management System</span>
            </a>
            
            <?php if($_SESSION['login']) { ?> 
            <div class="right-div">
                <a href="logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>LOG ME OUT</span>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php if($_SESSION['login']) { ?>
    <!-- MENU SECTION FOR LOGGED-IN USERS -->
    <section class="menu-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuTop">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="menuTop">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="dashboard.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
                                            <i class="fas fa-tachometer-alt"></i>
                                            <span>DASHBOARD</span>
                                        </a>
                                    </li>

                                    <!-- Account Dropdown -->
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle <?= in_array(basename($_SERVER['PHP_SELF']), ['my-profile.php', 'change-password.php']) ? 'active' : '' ?>" id="accountDropdown" role="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-user-cog"></i>
                                            <span>ACCOUNT</span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                            <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'my-profile.php' ? 'active' : '' ?>" href="my-profile.php">My Profile</a></li>
                                            <li><a class="dropdown-item <?= basename($_SERVER['PHP_SELF']) == 'change-password.php' ? 'active' : '' ?>" href="change-password.php">Change Password</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="issued-books.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'issued-books.php' ? 'active' : '' ?>">
                                            <i class="fas fa-book-open"></i>
                                            <span>ISSUED BOOKS</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <!-- MENU SECTION FOR GUESTS -->
    <section class="menu-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="guest-menu">
                        <li><a href="adminlogin.php">Admin Login</a></li>
                        <li><a href="signup.php">User Signup</a></li>
                        <li><a href="index.php">User Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>