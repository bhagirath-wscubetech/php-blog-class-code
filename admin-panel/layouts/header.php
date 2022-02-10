<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
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
    </style>
</head>

<body>
    <header class="container-fluid bg-dark text-white sticky-top">
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
                                <a href="">
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