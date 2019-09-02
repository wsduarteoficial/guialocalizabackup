@extends('email.notifications.full.main')

@section('main-content')

<table class="full" width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin-bottom: 50px;">
    <!-- START OF HEADING-->
    <tr>
        <td class="center" align="center" style="padding-bottom: 15px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:20px; line-height:28px; mso-line-height-rule: exactly;">
            <multi>
                <span>
                    Solicitação de Alteração de Cadastro
                </span>
            </multi>
        </td>
    </tr>

    <tr>
        <td class="center" align="center" style="padding-bottom: 10px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:18px; line-height:28px; mso-line-height-rule: exactly;">
            <multi>
                <span>
                    Dados de Contato
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF HEADING-->
    
    <!-- START OF TEXT-->
    <tr>
        <td class="center" align="center" style="margin: 0; font-size:13px ; font-weight: normal; color:#7f7f7f; font-family: 'Raleway', sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
            <multi>
                <span>

                    <table class="tg" style="undefined;table-layout: fixed; width: 600px">
                        <colgroup>
                            <col style="width: 60px">
                            <col style="width: 139px">
                        </colgroup>

                        <tr>
                            <td class="tg-9hbo">Nome:</td>
                            <td class="tg-yw4l">{{ @$name_contact }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Email:</td>
                            <td class="tg-yw4l">{{ @$email_contact }}</td>
                        </tr>

                    </table>
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF TEXT-->    
</table>

<table class="full" width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin-bottom: 50px;">
    <!-- START OF HEADING-->
    <tr>
        <td class="center" align="center" style="padding-bottom: 10px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:18px; line-height:28px; mso-line-height-rule: exactly;">
            <multi>
                <span>
                    Dados da Empresa (Busca no Site)
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF HEADING-->
    
    <!-- START OF TEXT-->
    <tr>
        <td class="center" align="center" style="margin: 0; font-size:13px ; font-weight: normal; color:#7f7f7f; font-family: 'Raleway', sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
            <multi>
                <span>

                    <table class="tg" style="undefined;table-layout: fixed; width: 600px">
                        <colgroup>
                            <col style="width: 60px">
                            <col style="width: 139px">
                        </colgroup>

                        <tr>
                            <td class="tg-9hbo">Nome Fantasia:</td>
                            <td class="tg-yw4l">{{ @$name_fantasy }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Descrição ou Slogan:</td>
                            <td class="tg-yw4l">{{ @$description }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Categoria:</td>
                            <td class="tg-yw4l">{{ @$category }}</td>
                        </tr>

                    </table>
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF TEXT-->    
</table>


<table class="full" width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin-bottom: 50px;">
    <!-- START OF HEADING-->
    <tr>
        <td class="center" align="center" style="padding-bottom: 10px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:18px; line-height:28px; mso-line-height-rule: exactly;">
            <multi>
                <span>
                    Informações Telefônicas
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF HEADING-->
    
    <!-- START OF TEXT-->
    <tr>
        <td class="center" align="center" style="margin: 0; font-size:13px ; font-weight: normal; color:#7f7f7f; font-family: 'Raleway', sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
            <multi>
                <span>

                    <table class="tg" style="undefined;table-layout: fixed; width: 600px">
                        <colgroup>
                            <col style="width: 60px">
                            <col style="width: 139px">
                        </colgroup>

                        <tr>
                            <td class="tg-9hbo">Telefone Fixo:</td>
                            <td class="tg-yw4l">{!! @$phone_fixed !!}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Telefone Celular:</td>
                            <td class="tg-yw4l">{!! @$phone_cell !!}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Outros:</td>
                            <td class="tg-yw4l">{!! @$phone_others !!}</td>
                        </tr>

                    </table>
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF TEXT-->    
</table>



<table class="full" width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin-bottom: 50px;">
    <!-- START OF HEADING-->
    <tr>
        <td class="center" align="center" style="padding-bottom: 10px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:18px; line-height:28px; mso-line-height-rule: exactly;">
            <multi>
                <span>
                    Endereço Físico da Empresa
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF HEADING-->
    
    <!-- START OF TEXT-->
    <tr>
        <td class="center" align="center" style="margin: 0; font-size:13px ; font-weight: normal; color:#7f7f7f; font-family: 'Raleway', sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
            <multi>
                <span>

                    <table class="tg" style="undefined;table-layout: fixed; width: 600px">
                        <colgroup>
                            <col style="width: 60px">
                            <col style="width: 139px">
                        </colgroup>

                        <tr>
                            <td class="tg-9hbo">Endereço:</td>
                            <td class="tg-yw4l">{{ @$address }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Número:</td>
                            <td class="tg-yw4l">{{ @$number }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Complemento:</td>
                            <td class="tg-yw4l">{{ @$complement }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Bairro:</td>
                            <td class="tg-yw4l">{{ @$district }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Cep:</td>
                            <td class="tg-yw4l">{{ @$cep }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Cidade:</td>
                            <td class="tg-yw4l">{{ @$city }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Estado:</td>
                            <td class="tg-yw4l">{{ @$abbr }}</td>
                        </tr>

                    </table>
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF TEXT-->    
</table>


<table class="full" width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin-bottom: 50px;">
    <!-- START OF HEADING-->
    <tr>
        <td class="center" align="center" style="padding-bottom: 10px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:18px; line-height:28px; mso-line-height-rule: exactly;">
            <multi>
                <span>
                    Observações
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF HEADING-->
    
    <!-- START OF TEXT-->
    <tr>
        <td class="center" align="center" style="margin: 0; font-size:13px ; font-weight: normal; color:#7f7f7f; font-family: 'Raleway', sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
            <multi>
                <span>

                    <table class="tg" style="undefined;table-layout: fixed; width: 600px">

                        <tr>
     
                            <td>{!! @$comments !!}</td>
                        </tr>

                    </table>
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF TEXT-->    
</table>


<table class="full" width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin-bottom: 50px;">
        <!-- START OF HEADING-->
        <tr>
            <td class="center" align="center" style="padding-bottom: 10px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:18px; line-height:28px; mso-line-height-rule: exactly;">
                <multi>
                    <span>
                        URLs de Acesso
                    </span>
                </multi>
            </td>
        </tr>
        <!-- END OF HEADING-->
        
        <!-- START OF TEXT-->
        <tr>
            <td class="center" align="center" style="margin: 0; font-size:13px ; font-weight: normal; color:#7f7f7f; font-family: 'Raleway', sans-serif; line-height: 23px;mso-line-height-rule: exactly;">
                <multi>
                    <span>

                        <table class="tg" style="undefined;table-layout: fixed; width: 600px">
                            <colgroup>
                                <col style="width: 60px">
                                <col style="width: 139px">
                            </colgroup> 
    
                            <tr>
                                <td class="tg-9hbo">Editar Página:</td>
                                <td class="tg-yw4l">{{ route('admin.companies.edit', $company_id) }}</td>
                            </tr>

                            <tr>
                                <td class="tg-9hbo">Visualizar Página:</td>
                                <td class="tg-yw4l">{{ base64_decode( $url_company ) }}</td>
                            </tr>
    
                        </table>

                    </span>
                </multi>
            </td>
        </tr>
        <!-- END OF TEXT-->    
    </table>
@endsection
