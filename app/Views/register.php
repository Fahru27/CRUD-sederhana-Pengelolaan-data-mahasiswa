<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="<?= base_url(); ?>/css/style2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <?php if (isset($validation)) : ?>
                                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <form action="/register/save" method="post">
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="username">Username</label>
                                                    <input class="form-control py-4" id="username" name="username" type="text" placeholder="Masukkan username" value="<?= set_value('username') ?>" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Masukkan email" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="password">Password</label>
                                                    <input class="form-control py-4" id="password" type="password" name="password" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="confpassword">Confirm Password</label>
                                                    <input class="form-control py-4" id="confpassword" name="confpassword" type="password" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Register</button></div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="/login">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>