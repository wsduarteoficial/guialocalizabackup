<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Relatório de Cliques de Visualização de Telefones - {{ $plan->name }} #P-{{ Request::get('page') ? Request::get('page') : 1 }} Período {{ tools_format_do_date( $date_start ) }} à {{ tools_format_do_date( $date_end ) }}</title>

  @include('admin::report.partials.scripts-header')

</head>
<body>

  <div class="container-fluid" style="margin-top: 15px;">

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Relatório de Cliques de Visualização de Telefones - {{ $plan->name }} - Período {{ tools_format_do_date( $date_start ) }} à {{ tools_format_do_date( $date_end ) }}
            </h3>
          </div>
          <div class="panel-body">
            <table id="example" class="display nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Quantidade de Cliques</th>
                  <th>Plano</th>
                  <th>Cidade</th>
                  <th>Status</th>
                  <th>Data Período</th>
                </tr>
              </thead>

              <tbody>

                @foreach($companies as $company)
                <tr>
                  <td>{{ $company->name_fantasy }}</td>
                  <td>
                    {{ $company->countClicks($company->id, $date_start, $date_end) }}
                  </td>
                  <td>{{ $company->plan->name }}</td>
                  <td>{{ $company->city->name . '/'. $company->state->abbr }}</td>
                  <td>{{ $company->active ? 'Ativo' : 'Inativo' }}</td>
                  <td>
                    {{ tools_format_do_date( $date_start ) }} à {{ tools_format_do_date( $date_end ) }}
                  </td>
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
                              ->appends(Request::only('date_start'))
                              ->appends(Request::only('date_end'))
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
