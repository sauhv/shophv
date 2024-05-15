<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
    <title>Admin | Login</title>


    <!-- ===============================================--><!--    Stylesheets--><!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="../../../assets/css/theme.min.css" rel="stylesheet" id="style-default">
</head>

<body>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <div class="row flex-between-center mb-2">
                                <div class="col-auto m-auto">
                                    <h4>Admin Login</h4>
                                </div>
                            </div>
                            <form method="post">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" type="email" placeholder="Email address" name="email" required/>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="password" placeholder="Password" name="password"/>
                                </div>
                                <div class="row flex-between-center">
                                    <div class="col-auto">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="basic-checkbox" name="remember"/>
                                            <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-auto"><a class="fs-10" href="forgot-password.html">Forgot Password?</a></div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->
    <!-- ===============================================--><!--    JavaScripts--><!-- ===============================================-->
    <script src="../../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../../vendors/fontawesome/all.min.js"></script>
    <script src="../../../assets/js/theme.js"></script>
</body>

</html>