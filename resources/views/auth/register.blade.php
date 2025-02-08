<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Register - SB Admin</title>
  <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                  <h3 class="text-center font-weight-light my-4">
                    Create Student Account
                  </h3>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('register') }}">
                    @csrf                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control @error('name') is-invalid @enderror" id="inputFirstName" type="text"
                            placeholder="Enter your name" name="name" />
                                @error('name')
                                 <div class="text text-danger">{{ $message }}</div>
                               @enderror
                          <label for="name">Student Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">

                      </div>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com" name="email" />
                      @error('email')
                      <div class="text text-danger">{{$message}}</div>
                      @enderror
                      <label for="inputEmail">Email address</label>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password"
                            placeholder="Create a password" name="password" />
                            @error('password')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                          <label for="inputPassword">Password</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPasswordConfirm" type="password"
                            placeholder="Confirm password" name="password_confirmation"/>
                            @error('password_confirmation')
                            <div class="text text-danger">{{$message}}</div>
                            @enderror
                          <label for="inputPasswordConfirm">Confirm Password</label>
                        </div>
                      </div>
                    </div>
                    <div class="mt-4 mb-0">
                      <div class="d-grid">
                        <button class="btn btn-primary btn-block">Create Account</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small">
                    <a href="{{route('login')}}">Have an account? Go to login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="{{asset('backend/js/scripts.js')}}"></script>
</body>

</html>