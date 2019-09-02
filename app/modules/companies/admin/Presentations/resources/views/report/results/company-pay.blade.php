<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Relatório de Vencimentos - {{ $plan->name }} #P-{{ Request::get('page') ? Request::get('page') : 1 }} Período {{ tools_format_do_date( $date_start ) }} à {{ tools_format_do_date( $date_end ) }}</title>

  @include('admin::report.partials.scripts-header')

</head>
<body>

  <div class="container-fluid" style="margin-top: 15px;">

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Relatório de Vencimentos - {{ $plan->name }} - Período {{ tools_format_do_date( $date_start ) }} à {{ tools_format_do_date( $date_end ) }}
            </h3>
          </div>
          <div class="panel-body">
            <table id="example" class="display nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Vencimento</th>
                  <th>Nome</th>
                  <th>Plano</th>
                  <th>Cidade</th>
                  <th>Status</th>
                </tr>
              </thead>

              <tbody>

                @foreach($companies as $company)
                <tr>
                  <td>
                    {{ tools_format_do_date( $company->getDatePlanContract($company->id) ) }}
                  </td>
                  <td><a href="{{ route('admin.companies.edit', $company->id) }}" target="_blank">{{ $company->name_fantasy }}</a></td>
                  <td>{{ $company->plan->name }}</td>
                  <td>{{ $company->city->name . '/'. $company->state->abbr }}</td>
                  <td>{{ $company->active ? 'Ativo' : 'Inativo' }}</td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-md-12">
        @if(isset( $companies ) )

          {!! $companies->appends(Request::only('active'))
                              ->appends(Request::only('plan'))
                              ->appends(Request::only('state'))
                              ->appends(Request::only('city'))
                              ->render() !!}
        @endif
      </div>
    </div>
  </div>




</body>
</html>
