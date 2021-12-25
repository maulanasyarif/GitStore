<html>

<head></head>
<title>Register</title>

<body>
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-12">
            <a class="navbar-brand" href="/">GitStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route ('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route ('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container py-5 mt-4">
            <div class="d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card text-center border-dark mb-3 shadow bg-dark">
                        <div class="card-header text-white">
                            Please Regis !!!
                        </div>
                        <div class="card-body shadow">
                            <form method="POST" action="{{ route('processRegis') }}">
                                @csrf
                                <div class="form-group row text-white mb-3">
                                    <label for="name" class="col-sm-4 col-form-label text-md-right">Store Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" required
                                            autofocus>
                                    </div>
                                </div>

                                <div class="form-group row text-white mb-3">
                                    <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" required
                                            autofocus>
                                    </div>
                                </div>

                                <div class="form-group row text-white mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>

</html>