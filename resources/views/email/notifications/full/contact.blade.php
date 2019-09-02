@extends('email.notifications.full.main')

@section('main-content')

<table class="full" width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
    <!-- START OF HEADING-->
    <tr>
        <td class="center" align="center" style="padding-bottom: 10px; text-transform: uppercase; font-weight: bold; font-family: 'Raleway', sans-serif; color:#4a4a4a; font-size:18px; line-height:28px; mso-line-height-rule: exactly;">
            <multi>
                <span>
                    Fale Conosco
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
                            <td class="tg-yw4l">{{ $name }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Email:</td>
                            <td class="tg-yw4l">{{ $email }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Assunto:</td>
                            <td class="tg-yw4l">{{ $subject }}</td>
                        </tr>

                        <tr>
                            <td class="tg-9hbo">Messagem:</td>
                            <td class="tg-yw4l">{!! nl2br( tools_make_clickable( $message_subject ) ) !!}</td>
                        </tr>
                    </table>
                </span>
            </multi>
        </td>
    </tr>
    <!-- END OF TEXT-->
    
</table>
@endsection
