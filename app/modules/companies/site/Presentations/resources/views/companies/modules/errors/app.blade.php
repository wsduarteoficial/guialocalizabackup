<!doctype html>

<html lang="pt_br">

    @include('site::companies.partials.home.head')

    <body>
        @include('site::companies.partials.shared.tag-manager-body')
        <a id="start"></a>

        @include('site::companies.partials.home.nav-container')

        <div class="main-container">

            @yield('main-content')

            @include('site::companies.partials.shared.footer')

        </div>

        @include('site::companies.assets.js.scripts-htmls-home')

    </body>
</html>
