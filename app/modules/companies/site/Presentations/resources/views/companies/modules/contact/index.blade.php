@extends('site::companies.modules.contact.app')

@section('main-content')
<div class="main-container">

    @desktop

    <section class="switchable ">
        <div class="container">
            <div class="row">

                @include('site::companies.modules.contact.form')
                @include('site::companies.modules.contact.phones')

            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    @elsedesktop

     <section class="switchable " style="margin: 0 20px 0 20px;">
        <div class="container">
            <div class="row">

                @include('site::companies.modules.contact.phones')

                @include('site::companies.modules.contact.form')

            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    @enddesktop

</div>


@endsection

@section('breadcrumbs')

{!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}
{!! tools_breadcrumbs(null, 'Fale Conosco', false) !!}

@endsection
