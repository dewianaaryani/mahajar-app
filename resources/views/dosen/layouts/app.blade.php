<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>
<body style="padding-left: 80px; padding-right: 80px; padding-top: 25px">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
              <a class="nav-link" @yield('backItem')><img  src="{!! asset('assets/external/dashimg/back.png') !!}" style="width: 50px; height: 45px; margin-top: 15px"/>
               </a>    
            </li>
            <div style="width: 55px; height: 0px;  transform: rotate(90deg); transform-origin: 0 0; border: 1px black solid; margin-top: 20px"></div>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #002C6E; font-size: 48px; font-family: Acme; font-weight: 400; word-wrap: break-word;"><span><img style="width: 62px; height: 57px; padding-bottom: 10px" src="{!! asset('assets/external/dashimg/logo.svg') !!}" class="mr-3"/></span>MAHAJAR</a>
            </li>
          </ul>
          <span class="navbar-text">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf <!-- Add CSRF token for security -->
                    <button type="submit" class="btn px-3" style="color: #fff; font-size: 20px; font-family:poppins; font-weight: 400; word-wrap: break-word; background-color: #5271FF; border-radius: 10px;padding: 10px;">Logout</button>
                </form>
          </span>
        </div>
      </nav>
      <main style="padding: 30px">
        @yield('content')
      </main>
      
    <!-- Summernote JS -->
    
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 20,
                height: 100,
               
                toolbar: [

                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
                ]
            });
        });
    </script>
</body>
</html>