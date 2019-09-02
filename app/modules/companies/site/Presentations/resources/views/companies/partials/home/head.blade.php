<head>
    @include('site::companies.partials.shared.tag-manager-head')
    <meta charset="utf-8">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/assets/companies/site/theme/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/theme/css/stack-interface.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/theme/css/socicon.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/theme/css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/theme/css/flickity.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/theme/css/iconsmind.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/theme/css/jquery.steps.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/theme/css/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('/assets/companies/site/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i%7CMaterial+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @include('site::companies.partials.shared.html-icons')
    <base href="{{ url('/assets/companies/site/theme/') }}">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7925523524898180",
        enable_page_level_ads: true
    });
    </script>
</head>
