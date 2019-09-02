<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Relatório de Buscas no Site #P-{{ Request::get('page') ? Request::get('page') : 1 }} Período {{ tools_format_do_date( $date_start ) }} à {{ tools_format_do_date( $date_end ) }}</title>

  @include('admin::report.partials.scripts-header')

</head>
<body>

  <div class="container-fluid" style="margin-top: 15px;">

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Relatório de Buscas no Site - Período {{ tools_format_do_date( $date_start ) }} à {{ tools_format_do_date( $date_end ) }}
            </h3>
          </div>
          <div class="panel-body">
            <table id="example" class="display nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Palavra Chave</th>
                  <th>Total Encontrados</th>
                  <th>Cidade</th>
                  <th>IP</th>
                  <th>Data e Horário</th>
                </tr>
              </thead>

              <tbody>
  
                @foreach($logs as $log)
                <tr>
                  <td><a href="{{ $log->url }}" target="_blank">{{ $log->tag_search }}</a></td>
                  <td>{{ tools_convert_to_decimal_br( $log->total, 0) }}</td>
                  @if($log->state_id > 0 )

                    @if(isset($log->city->name, $log->state->abbr))
                      <td>{{ $log->city->name . '/'. $log->state->abbr }}</td>
                    @elseif(isset($log->state->abbr))
                      <td>{{ $log->state->abbr }}</td>
                    @endif

                  @else
                  <td>--</td>  
                  @endif
                  <td><a href="http://ip-api.com/#{{ $log->ip }}" target="_blank">{{ $log->ip }}</a></td>
                  <td>{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
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
        @if(isset( $logs ) )

          {!! $logs->appends(Request::only('active'))
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
