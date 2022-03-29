<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Panel</title>
    <style>
        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        a {
            color: inherit !important;
            text-decoration: none;
        }

        #sideMenu {
            padding-left: 0;
        }

        #sideMenu>li {
            list-style: none;
            padding: 10px;
            font-size: 20px;
            transition: 1s;
            cursor: pointer;
            position: relative;
            z-index: 99999999;
        }

        #sideMenu .fa-sort-down {
            position: absolute;
            right: 15px;
        }

        #sideMenu>li:hover {
            background-color: #212529;
        }

        .child {
            list-style: none;
            margin-top: 10px;
            padding: 5px 10px;
            display: none;
        }

        #myAlert {
            visibility: hidden;
            position: fixed;
            color: white;
            border-radius: 10px;
            top: 0;
            right: 0;
            transform: translate(-15px, 15px);
            background: #d62828;
            border-radius: 10px;
            overflow: hidden
        }

        .myAlert-text-icon {
            align-items: stretch;
            box-shadow: 0 1px 1px rgb(10 10 10 / 10%);
            display: flex;
            max-width: 250px;

        }

        .myAlert-message {
            align-items: center;
            display: flex;
            flex-grow: 1;
            font-weight: 700;
            padding: 15px 25px;
        }

        .close {
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            background: 0 0;
            border: none;
            color: currentColor;
            font-family: inherit;
            font-size: 1em;
            margin: 0;
            padding: 0;
            align-items: center;
            cursor: pointer;
            display: flex;
            justify-content: center;
            padding: 0.75rem 1rem;

        }

        #myAlert.show {
            visibility: visible;
        }


        #myAlert.show {
            animation: show 0.5s forwards;
        }

        @keyframes show {
            0% {
                transform: translate(-15px, 15px) scale(0);
            }

            50% {
                transform: translate(-15px, 15px) scale(1.2);
            }

            70% {
                transform: translate(-15px, 15px) scale(0.9);
            }

            100% {
                transform: translate(-15px, 15px) scale(1);
            }
        }

        #myAlertBar {
            height: 2px;
            background-color: #ddd;
            color: white;
        }

        #myAlertProgress {
            background-color: #d62828;
            width: 100%
        }
    </style>
</head>

<body>
    <div id="myAlert">
        <div class="myAlert-text-icon">
            <div class="myAlert-message">
                Message here
            </div>
            <button class="close" onclick="hideAlert()">
                <i class='bx bx-x'></i>
            </button>
        </div>
        <div id="myAlertProgress">
            <div id="myAlertBar"></div>
        </div>
    </div>




    <header class="container-fluid bg-dark text-white">
        <div class="container py-2 text-center">
            <div class="row">
                <div class="col">User Name</div>
                <div class="col">
                    <a href="index.php">
                        Dashboard
                    </a>
                </div>
                <div class="col">Change Password</div>
                <div class="col">Logout</div>
                <div class="col">Profile</div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-0 bg-primary text-white" style="min-height: 100vh;">
                <ul id="sideMenu">
                    <li>
                        <i class="far fa-window-maximize"></i>
                        Page
                        <i class="fas fa-sort-down"></i>
                        <ul class="child bg-dark">
                            <li>
                                <a href="update-about.php">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Account setting
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <i class="far fa-newspaper"></i>
                        Announcement
                        <i class="fas fa-sort-down"></i>
                        <ul class="child bg-dark">
                            <li>
                                <a href="add-announcement.php">
                                    Add
                                </a>
                            </li>
                            <li>
                                <a href="view-announcement.php">
                                    View
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <i class="far fa-newspaper"></i>
                        Blog
                        <i class="fas fa-sort-down"></i>
                        <ul class="child bg-dark">
                            <li>
                                <a href="add-blog.php">
                                    Add
                                </a>
                            </li>
                            <li>
                                <a href="view-blogs.php">
                                    View
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <i class="far fa-newspaper"></i>
                        Categories
                        <i class="fas fa-sort-down"></i>
                        <ul class="child bg-dark">
                            <li>
                                <a href="add-category.php">
                                    Add
                                </a>
                            </li>
                            <li>
                                <a href="view-category.php">
                                    View
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <i class="fab fa-leanpub"></i>
                        Courses
                        <i class="fas fa-sort-down"></i>
                        <ul class="child bg-dark">
                            <li>
                                <a href="">
                                    Add
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    View
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <i class="far fa-images"></i>
                        Gallery
                        <i class="fas fa-sort-down"></i>
                        <ul class="child bg-dark">
                            <li>
                                <a href="">
                                    Add
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    View
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>