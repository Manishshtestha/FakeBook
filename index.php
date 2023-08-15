<?php
include 'query.php';
$user = new Queries();
if (isset($_POST['signup'])) {
    $user->insert('users', $_POST);
}elseif(isset($_POST['login'])){
    sleep(random_int(0,5));
    $user->login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FakeBook</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <style>
        body {
            background-color: lightgray;
        }
        .card{
            margin : 5% auto ;
        }
        .card-body{
            height: 40vh;
        }
        h1.title{
            margin-top: 90px;
            text-align: center;
            color: #0D6DFD;
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 mt-5">
                <h1 class="title">FakeBook</h1>
                <p style="text-align: center;">
                    FakeBook helps you connect and share with the people in your life.
                </p>
            </div>
            <div class="col-sm-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group mb-3">
                                <label for="username">Name Or Email</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" name="login">Login</button>
                            </div>
                            <hr>
                            <div class="position-absolute start-50 translate-middle">
                                <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Create New Account
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Signup popup (modal) -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Signup</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="first_name" placeholder="First Name"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="last_name" placeholder="Last Name"
                                            class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="email" name="email" placeholder="Mobile Number or Email address"
                                            class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="password" name="password" placeholder="Password"
                                            class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <p>Birthday</p>
                                    <div class="col-md-4">
                                        <select class="form-control" name="month">
                                            <option selected disabled>Month</option>
                                            <?php
                                            $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
                                            for ($i = 0; $i < count($months); $i++) {
                                                ?>
                                                <option value="<?= $i ?>"><?= $months[$i] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        
                                        <select class="form-control" name="day">
                                        <option selected disabled>Day</option>
                                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="year">
                                        <option selected disabled>Year</option>
                                            <?php for ($i = 2023; $i >= 1905; $i--) { ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <p>Gender</p>
                                    <div class="col-md-4">
                                        <input type="radio" name="gender" id="male" value="male">
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="gender" id="female" value="female">
                                        <label for="female">Female</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="gender" id="mentally_ill" value="Null">
                                        <label for="mentally_ill">Mentally ill</label>
                                    </div>
                                </div>
                                <p>By clicking Sign Up, you agree to our <span style="color:green">Terms, Privacy Policy and Cookies Policy</span>.</p>
                                <button type="submit" class="btn btn-primary" name="signup">Signup</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>