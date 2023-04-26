<!DOCTYPE html>
<html lang="en">
@include('pages.inc.head')
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                @include('pages.inc.menu')
            </div>
            <div class="col-sm-9 col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
