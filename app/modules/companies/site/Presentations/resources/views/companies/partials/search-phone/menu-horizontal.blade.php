<section class="bar bar-3 bar--sm">
    <div class="container-fluid menu-margin">
        <div class="row">
            <div class="col-md-8">
                <div class="bar__module" data-load="true">
                    <span class="type--fade">
                        Foram encontradas
                        {{ ( count($companies) > 0 ) ? tools_convert_to_decimal_br( $companies->total(),0 )  : 0 }}
                        resultados ({{$time}} segundos)
                    </span>
                </div>
            </div>
            <div class="col-md-4 text-right text-left-xs text-left-sm">
                <div class="bar__module" >
                    <ul class="menu-horizontal">

                        <li>
                            <a href="{{ route('site.advertise-free') }}" title="Saiba como Anunciar Grátis!" class="register">Cadastre sua empresa empresa gratuitamente!</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
