@extends('admin::app')

@section('breadcrumb')

<div class="col-md-6">

    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('admin.index') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Dashboard</span>
        </li>
    </ul>

</div>
<div class="col-md-6">
    <span class="pull-right">

        <a href="{{ route('admin.companies.create') }}" class="btn btn-lg register"> Cadastrar Usuário
            <i class="fa fa-plus"></i>
        </a>

    </span>
</div>

@endsection

@section('page-toolbar')
    @include('admin::partials.page-toolbar')
@endsection

@section('main-content')
<div class="page-content-inner">

    <div class="row">

        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlets">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-building"></i> Listando <strong> {{ isset( $companies ) ? tools_convert_to_decimal_br($companies->total(),0) : 0 }} </strong> empresas {!! isset($companies_route_title) ? $companies_route_title : 'via busca' !!}
                    </div>
                    <div class="tools">

                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th class="hidden-xs bold"> Nome</th>
                                    <th class="bold"> Telefone </th>
                                    <th class="bold"> Plano </th>
                                    <th class="bold"> Ativo </th>
                                    <th class="bold"> Cidade/UF </th>
                                    <th class="bold"> Ações </th>
                                </tr>
                            </thead>

                            <tbody>

                                @if(isset( $companies ) )

                                    @foreach($companies as $company)

                                    <tr>
                                        <td class="hidden-xs">
                                            <a href="{{ route('admin.companies.edit', $company->id) }}"><h4>{{ $company->name_fantasy }}</h4> </a>

                                            <span>
                                            @foreach($company->categories as $category)
                                                <h6><i class="icon-social-dribbble"></i> {{ $category->name }}</h6>
                                            @endforeach
                                            </span>

                                            <span>Última alteração: {{ $company->updated_at->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            @php
                                            $phone_number = [];
                                            @endphp
                                            @foreach($company->phones as $key => $phone)
                                                @php
                                                if($key<=1) {
                                                    if($phone->type==='cell') {
                                                        $number = tools_mask($phone->number, '(##) #####-####');
                                                    } else {
                                                         $number = tools_mask($phone->number, '(##) ####-####');
                                                    }
                                                    array_push($phone_number,  $number);
                                                }
                                                if($key>1) {
                                                    array_push($phone_number,  '...');
                                                }
                                                @endphp
                                            @endforeach
                                            {{  implode(', ', $phone_number) }}
                                        </td>

                                        <td>
                                            @php
                                                if($company->plan_id === '1') :
                                                    $label='label-default';
                                                elseif($company->plan_id === 2) :
                                                    $label='label-info';
                                                elseif($company->plan_id === 3) :
                                                    $label='label-danger';
                                                else :
                                                    $label='label-warning';
                                                endif;
                                            @endphp

                                            <span class="label label-sm {{ $label }} label-mini"> {{ $company->plan->name }} </span>
                                        </td>

                                        <td>
                                            <input type="checkbox" class="jq_change_status_company" {!! $company->active == '1' ? 'checked' : '' !!} value="{{ $company->active }}" data-id="{{ $company->id }}" data-name="{{ $company->name_fantasy }}" data-toggle="toggle" data-onstyle="success">

                                        </td>

                                        <td>
                                        @if(isset($company->city->name, $company->state->abbr))
                                            {{ $company->city->name ."/". $company->state->abbr }}
                                        @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-xs blue">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>

                                            <a class="btn btn-xs red jq_remove_company" data-id="{{ $company->id }}" data-name="{{ $company->name_fantasy }}">
                                                Enviar para Lixeira <i class="fa fa-trash"></i>
                                            </a>

                                        </td>

                                    </tr>

                                    @endforeach

                                @else
                                    <tr>
                                        <td colspan="6" align="center">Nenhum registro econtrado!</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @if(isset( $companies ) )

                {!! $companies->appends(Request::only('name_fantasy'))
                                    ->appends(Request::only('active'))
                                    ->appends(Request::only('number_phone'))
                                    ->appends(Request::only('phone'))
                                    ->appends(Request::only('plan'))
                                    ->appends(Request::only('category'))
                                    ->appends(Request::only('state'))
                                    ->appends(Request::only('city'))
                                    ->render() !!}
            @endif

        </div>
    </div>
</div>
@endsection

@include('admin::company.scripts-list')
