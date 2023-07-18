<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kids Cash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <style>
            body {
                background-color: #FDFAF9;
            }

        </style>

    </head>
    <body>
    <!--Main Body Container-->
        <div class="container-fluid">
            <div class="row flex-nowrap">

                <!--Left column-->
                <div class="col-md-2  col-auto min-vh-100" style="background-color: #2A364B">
                    <ul class="nav nav-pills flex-column">
                        <li>
                            <img  width="100" height="100" alt="Woodlake Kids logo" src={{URL::asset('/images/logo.png')}}>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/students">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admin</a>
                        </li>
                    </ul>
                </div>

                <!--Middle Column main content column-->
                <div class="col-md-10 text-left py-3">
                    {{$slot}};
                </div>
            </div>
        </div>
    </body>
</html>
{{--            <ul class="">--}}
{{--                <li> <img  width="100" height="100" alt="Woodlake Kids logo" src={{URL::asset('/images/logo.png')}}></li>--}}
{{--                <li>Home</li>--}}
{{--                <li>History</li>--}}
{{--                <li>Store</li>--}}
{{--                <li>Admin</li>--}}
{{--            </ul>--}}
