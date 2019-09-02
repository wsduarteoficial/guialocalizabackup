<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Relatório em ordem alfabética por nome {{ isset( $plan->name )  ? " - ". $plan->name : "" }} #P-{{ Request::get('page') ? Request::get('page') : 1 }} {{ date('d-m-Y_H:i:s') }}</title>

  @include('admin::report.partials.scripts-header')

</head>
<body>

  <div class="container-fluid" style="margin-top: 15px;">

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              Relatório em ordem alfabética por nome {{ isset( $plan->name )  ? " - ". $plan->name : "" }}
            </h3>
          </div>
          <div class="panel-body">
            <table id="example" class="display nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Telefones</th>
                  <th>Plano</th>
                  <th>Cidade</th>
                  <th>Status</th>
                  <th>Data cadastro</th>
                </tr>
              </thead>

              <tbody>

                @foreach($companies as $company)
                <tr>
                  <td>{{ $company->name_fantasy }}</td>
                  <td>
                    @php
                      $phone_number = [];
                    @endphp
                    @foreach($company->phones as $key => $phone)
                      @php
                      if($phone->type==='cell') {
                          $number = tools_mask($phone->number, '(##) #####-####');
                      } else {
                           $number = tools_mask($phone->number, '(##) ####-####');
                      }
                      array_push($phone_number,  $number);
                      @endphp
                    @endforeach
                    {{  implode(', ', $phone_number) }}
                  </td>
                  <td>{{ $company->plan->name }}</td>
                  <td>{{ $company->city->name . '/'. $company->state->abbr }}</td>
                  <td>{{ $company->active ? 'Ativo' : 'Inativo' }}</td>
                  <td>{{ $company->created_at->format('d/m/Y H:i:s') }}</td>
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
