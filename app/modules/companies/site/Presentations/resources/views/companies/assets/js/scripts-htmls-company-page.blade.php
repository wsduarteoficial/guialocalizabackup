<!--<div class="loader"></div>-->
<!--
<a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
    <i class="stack-interface stack-up-open-big"></i>
</a>
-->

<script src="{{ asset('/assets/companies/site/theme/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('/assets/companies/site/theme/js/lightbox.min.js') }}"></script>
<script src="{{ asset('/assets/companies/site/theme/js/scripts.js') }}"></script>
<script src="{{ asset('/js/plugins/jquery/jquery.autocomplete.min.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>


@yield('scriptsearchcategories')

@include('site::companies.assets.js.inc_systemjs', ['file'=> 'main-company-page'])
