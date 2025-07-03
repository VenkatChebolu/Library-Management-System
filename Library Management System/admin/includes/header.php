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

        /* Enhanced Header Styles with Larger Sizing */
        .advanced-header {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: var(--white);
            padding: 1rem 0;  /* Increased padding */
            box-shadow: var(--shadow);
            position: relative;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 3rem;  /* Increased padding */
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 1.5rem;  /* Increased gap */
        }

        .logo-img {
            height: 60px;  /* Increased size */
            filter: brightness(0) invert(1);
        }

        .system-title {
            font-size: 2rem;  /* Increased font size */
            font-weight: 700;
            margin: 0;
            color: var(--white);
        }

        .admin-dashboard-label {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 0.8rem 1.5rem;  /* Increased padding */
            border-radius: 25px;
            font-size: 1.1rem;  /* Increased font size */
            display: flex;
            align-items: center;
            gap: 0.8rem;  /* Increased gap */
            margin-top: 0.5rem;
        }

        .logout-btn {
            background-color: var(--white);
            color: var(--primary-blue);
            border: none;
            padding: 0.8rem 2rem;  /* Increased padding */
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;  /* Increased font size */
            display: flex;
            align-items: center;
            gap: 0.8rem;  /* Increased gap */
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        /* Enhanced Navigation Styles */
        .advanced-nav {
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 1rem 0;  /* Increased padding */
        }

        .nav-container {
            display: flex;
            justify-content: center;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 1rem;  /* Increased gap */
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: var(--dark-gray);
            padding: 1rem 2rem;  /* Increased padding */
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;  /* Increased font size */
            border-radius: 30px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.8rem;  /* Increased gap */
        }

        .nav-link i {
            font-size: 1.2rem;  /* Increased icon size */
        }

        .dropdown-toggle::after {
            margin-left: 0.5rem;
            vertical-align: middle;
        }

        /* Enhanced Dropdown Styles */
        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: var(--shadow);
            padding: 0.8rem 0;  /* Increased padding */
            min-width: 220px;  /* Increased width */
        }

        .dropdown-item {
            padding: 0.8rem 1.8rem;  /* Increased padding */
            font-size: 1rem;  /* Increased font size */
            transition: var(--transition);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .header-container {
                flex-direction: column;
                gap: 1.5rem;  /* Increased gap */
                padding: 1.5rem;  /* Increased padding */
            }

            .logo-container {
                flex-direction: column;
                text-align: center;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-link {
                padding: 0.8rem 1.2rem;  /* Adjusted padding */
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Enhanced Header -->
    <header class="advanced-header">
        <div class="container-fluid header-container">
            <div class="logo-container">
                <img src="assets/img/logo.png" alt="Library Logo" class="logo-img">
                <div>
                    <h1 class="system-title">Online Library Management System</h1>
                    <div class="admin-dashboard-label">
                        <i class="fas fa-user-shield"></i>
                        <span>ADMIN DASHBOARD</span>
                    </div>
                </div>
            </div>
            <a href="logout.php" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>LOG ME OUT</span>
            </a>
        </div>
    </header>

    <!-- Enhanced Navigation -->
    <nav class="advanced-nav">
        <div class="container-fluid nav-container">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>DASHBOARD</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="categoriesDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-tags"></i>
                        <span>CATEGORIES</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <li><a class="dropdown-item" href="add-category.php">Add Category</a></li>
                        <li><a class="dropdown-item" href="manage-categories.php">Manage Categories</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="authorsDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-edit"></i>
                        <span>AUTHORS</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="authorsDropdown">
                        <li><a class="dropdown-item" href="add-author.php">Add Author</a></li>
                        <li><a class="dropdown-item" href="manage-authors.php">Manage Authors</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="booksDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-book"></i>
                        <span>BOOKS</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="booksDropdown">
                        <li><a class="dropdown-item" href="add-book.php">Add Book</a></li>
                        <li><a class="dropdown-item" href="manage-books.php">Manage Books</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="issueBooksDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-exchange-alt"></i>
                        <span>ISSUE BOOKS</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="issueBooksDropdown">
                        <li><a class="dropdown-item" href="issue-book.php">Issue New Book</a></li>
                        <li><a class="dropdown-item" href="manage-issued-books.php">Manage Issued Books</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="reg-students.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>REG STUDENTS</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="change-password.php" class="nav-link">
                        <i class="fas fa-key"></i>
                        <span>CHANGE PASSWORD</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add active class to current page
        document.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.pathname.split('/').pop();
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>