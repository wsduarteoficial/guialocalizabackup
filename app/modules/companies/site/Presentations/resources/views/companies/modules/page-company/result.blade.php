@extends('site::companies.modules.page-company.app')

@section('main-content')
<section class="space--sm">
    <div class="container">
        <div class="row">

            @if($company->plan_id > 1)
                @include('site::companies.modules.page-company.components.address-sponsors')
            @else
                @include('site::companies.modules.page-company.components.address-free')
            @endif

        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
@endsection
