<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <!-- bootstrap css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
  </head>
  <body class="container">

    <div class="container" id="navigation" >
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a href="{{route('articleshow')}}">
                <button class="btn btn-primary navbar-brand" id="articleshow">
                  Article
                </button>              
              </a>
              <a href="{{route('categoryshow')}}">
                <button class="btn btn-primary navbar-brand" id="articleshow">
                  Category
                </button>
              </a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">                 
                  <li class="nav-item"  id="log">
                    <a class="nav-link" href="#">
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#loginModal"
                      >
                        Login
                      </button>
                    </a>
                  </li>
                  <li class="nav-item" id="reg">
                    <a class="nav-link" href="#">
                      <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#registerModal"
                      >
                        Register
                      </button>
                    </a>                    
                  </li>
                  <li class="nav-item " id="log-out">
                    <a class="nav-link" href="#">
                      <button                      
                        type="button"
                        class="btn btn-danger"
                      >
                        Log Out
                      </button>
                    </a>                    
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
        @yield('content')

<!-- Modal login-->
<div
  class="modal fade"
  id="loginModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form onsubmit="proccesslogin(event)">
          <div class="alert alert-danger" role="alert" id="alert-login">
           
          </div>
          <div class="mb-3">
            <label for="loginemail" class="form-label">Email address</label>
            <input
              type="email"
              class="form-control"
              id="loginemail"
              aria-describedby="emailHelp"
              name="email"
            />
          </div>
          <div class="mb-3">
            <label for="loginpassword" class="form-label">Password</label>
            <input
              type="password"
              class="form-control"
              id="loginpassword"
              name="password"
            />
          </div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal register-->
<div
  class="modal fade"
  id="registerModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form onsubmit="proccessregister(event)">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              aria-describedby="emailHelp"
              name="name"
            />
          </div>
          <div class="mb-3">
            <label for="regemail" class="form-label">Email address</label>
            <input
              type="email"
              class="form-control"
              id="regemail"
              aria-describedby="emailHelp"
              name="email"
            />
          </div>
          <div class="mb-3">
            <label for="regpassword" class="form-label">Password</label>
            <input
              type="password"
              class="form-control"
              id="regpassword"
              name="password"
            />
          </div>

          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

   
        <!-- bootstrap js -->
   
        <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- local script --}}
  <script src="{{asset('js/script.js')}}"></script>
    @stack('scripts')
  </body>