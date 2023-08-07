<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kids Cash</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles


    </head>

    <body>
        <!-- Main Body Container -->
        <div class="container-fluid">
            <div class="row">
                <!-- Left column (sidebar) -->
                <div class="col-2 col-sm-2 min-vh-100" id="sidebar">
                    <ul class="nav mt-4 flex-column align-content-center">
                        <li class="nav-item py-2 py-sm-0">
                            <a class="nav-link" href="#">
                                <div class="logo-container">
                                    <img class="img-fluid" alt="Woodlake Kids logo" src={{URL::asset('/images/logo.png')}}>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a class="nav-link d-sm-inline-block" href="/dashboard">
                                <i class="bi bi-house "><span class="ms-2 d-none d-sm-inline">Home</span></i>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0">
                            <a class="nav-link d-sm-inline-block" href="/students">
                                <i class="bi bi-people"><span class="ms-2 d-none d-sm-inline">Student</span></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Middle Column main content column -->
                <div class="col-10 col-sm-10 mt-5">
                    {{-- Put your main content here --}}
                    <h1>Students</h1>
                    @livewire('form-elements')
{{--                    {{$slot}}--}}
                </div>
            </div>
        </div>
        @livewireScripts
    </body>
</html>



{{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et consectetur metus. Aenean rutrum odio--}}
{{--                    ac sodales gravida. Proin in mi eget erat porta semper a dictum mi. Nam velit orci, sollicitudin ut--}}
{{--                    ullamcorper in, semper lacinia nisl. Nunc ante sapien, lobortis sit amet aliquet eu, condimentum cons--}}
{{--                    ectetur purus. Integer ornare ante quis lacus consectetur, vulputate interdum dui pellentesque. Sed f--}}
{{--                    inibus nibh at mollis laoreet. Nam dictum euismod feugiat. In vitae lobortis massa, convallis aliqua--}}
{{--                    m ligula. Cras eget mauris justo. Aliquam erat volutpat. Quisque metus ligula, accumsan vitae sem a,--}}
{{--                    sodales scelerisque nibh. Praesent vitae congue leo. Mauris aliquam dictum nisl id vulputate. Donec--}}
{{--                    congue lorem sit amet enim lacinia dignissim. Praesent facilisis vel ex ultricies consequat. Morbi--}}
{{--                    vehicula justo id elit tincidunt, in feugiat l ectus pharetra. Nunc hendrerit enim a tincidunt--}}
{{--                    suscipit. Aliquam tempor odio vel est gravida pulvinar. Pellentesque convallis metus orci, in posuere--}}
{{--                    augue euismod dapibus. Sed non congue justo. Class aptent taciti sociosqu ad litora torquent per--}}
{{--                    conubia nostra, per inceptos himenaeos. In sed faucibus sem. Aliquam augue tellus, sodales nec--}}
{{--                    quam ut, blandit fermentum sapien. Donec varius, arcu in lobo rtis finibus, nisi metus posuere mi,--}}
{{--                    id volutpat magna erat quis tortor. Fusce lacinia volutpat ipsu m at maximus. Sed sit amet dui a--}}
{{--                    velit rhoncus tincidunt. Phasellus non leo ornare mauris laoreet co ngue et sed libero. Curabitur--}}
{{--                    molestie porta turpis, quis pulvinar mauris suscipit nec.--}}
{{--                </p>--}}
