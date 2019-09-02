<!doctype html>

<html lang="pt_br">

    @include('site::companies.partials.seo.company-page.head')

    <body>
        @include('site::companies.partials.shared.tag-manager-body')
        <a id="start"></a>

        @include('site::companies.partials.search-phone.nav-container')

        <div class="main-container">

            @include('site::companies.partials.seo.company-page.menu-horizontal')

            @yield('main-content')

            @include('site::companies.partials.shared.footer')

        </div>

        @include('site::companies.assets.js.scripts-htmls-company-page')

    </body>
</html>
