@extends('site::companies.modules.page.app')

@section('main-content')

<style>
#text-justify div {
    text-align: justify;
}

h1 {
    text-align: center;
}
</style>

<div class="main-container">

    <section class="text-center bg--secondary">
        <div class="container">
            <div class="row" id="text-justify">
                <div class="col-sm-10 col-sm-offset-1 col-md-12 col-md-offset-2">

                    <h1>{{ $page->title }}</h1>
                    <p>
                        {!! $page->body !!}
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

</div>

@endsection

@section('breadcrumbs')

    {!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}
    {!! tools_breadcrumbs(null, $page->title, false) !!}

@endsection
