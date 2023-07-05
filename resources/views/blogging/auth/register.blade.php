<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
rel="stylesheet"
/>
<style>
    .error{
        margin-left:40px !important;
    }
</style>
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
        @if(Session::has('warning'))
        <p class="alert alert-warning">{{ Session::get('warning') }}<span><i class="fab fa-times"></i></span></p>
      @endif
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      <form class="mx-1 mx-md-4" method="post" action="{{ route('user.signup') }}">
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text"  name="name" id="form3Example1c" class="form-control" value="{{ old('name') }}" />
                            <label class="form-label" for="form3Example1c">Your Name</label>
                          </div>
                        </div>
                        @error('name')
                        <p class="text-danger error">{{ $message }}</p>
                      @enderror
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="form3Example3c" class="form-control" value="{{ old('email') }}" />
                            <label class="form-label" for="form3Example3c">Your Email</label>
                          </div>
                        
                        </div>
                        @error('email')
                        <p class="text-danger error">{{ $message }}</p>
                      @enderror
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="password" id="form3Example4c" class="form-control" value="{{ old('password') }}"/>
                            <label class="form-label" for="form3Example4c">Password</label>
                          </div>
                       
                        </div>
                        @error('password')
                        <p class="ml-3 text-danger error">{{ $message }}</p>
                         @enderror
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text"  name="re_password" id="form3Example4cd" class="form-control"  value="{{ old('re_password') }}"/>
                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                          </div>
                         
                        </div>
                        @error('re_password')
                        <p class="text-danger error">{{ $message }}</p>
                      @enderror
      
                        <div class="form-check d-flex justify-content-center mb-5">
                          <input class="form-check-input me-2" type="checkbox" value="terms" id="form2Example3c" />
                          <label class="form-check-label" for="form2Example3">
                            I agree all statements in <a href="#!">Terms of service</a>
                          </label>
                         
                        </div>
            
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div> 
                         @csrf
                      </form>
                      <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-label" >
                            Already Register<a href="{{ route('user.login') }}">  Login</a>
                          </label>
                    </div>
                  
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                        class="img-fluid" alt="Sample image">
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>  
      <script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
</body>
</html>