<!--end of tabs container-->
<footer class="footer-3 text-center-xs space--xs " data-load="true">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <img alt="Image" class="logo" src="{{ asset( '/storage/uploads/logos-app/logo.png' ) }}" />
            <ul class="list-inline list--hover">
                <li>
                    <a href="{{ route('pages.view', 'quem-somos') }}" title="Quem Somos">
                        <span class="type--fine-print">Quem Somos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('site.contact') }}" title="Fale Conosco">
                        <span class="type--fine-print">Fale Conosco</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('site.sitemap.seo') }}" title="Mapa do Site">
                        <span class="type--fine-print">Mapa do Site</span>
                    </a>
                </li>

                @php
                $pagesNotDefault = \GuiaLocaliza\Companies\Site\Domains\Models\Page\Page::where(['active' => 1, 'default' => 0])->get(['title', 'slug']);
                @endphp

                @foreach($pagesNotDefault as $p)
                <li>
                    <a href="{{ route('pages.view', $p->slug ) }}" title="{{ $p->title }}">
                        <span class="type--fine-print">{{ $p->title }}</span>
                    </a>
                </li>
                @endforeach

            </ul>
        </div>

        @php
        $social = \GuiaLocaliza\Companies\Site\Domains\Models\Setting\Setting::find(1);
        @endphp

        <div class="col-sm-6 text-right text-center-xs">
            <ul class="social-list list-inline list--hover">

                @if(!empty( $social->facebook ))
                <li>
                    <a target="_BLANK" href="{{ $social->facebook }}">
                        <i class="socicon socicon-facebook icon icon--xs"></i>
                    </a>
                </li>
                @endif

                @if(!empty( $social->twitter ))
                <li>
                    <a target="_BLANK" href="{{ $social->twitter }}">
                        <i class="socicon socicon-twitter icon icon--xs"></i>
                    </a>
                </li>
                @endif

                @if(!empty( $social->google ))
                <li>
                    <a target="_BLANK" href="{{ $social->google }}">
                        <i class="socicon socicon-google icon icon--xs"></i>
                    </a>
                </li>
                @endif

                @if(!empty( $social->instagram ))
                <li>
                    <a target="_BLANK" href="{{ $social->instagram }}">
                        <i class="socicon socicon-instagram icon icon--xs"></i>
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>
    <!--end of row-->
    <div class="row">
        <div class="col-sm-6">
            <p class="type--fine-print">
                O guia empresarial de toda região!
            </p>
        </div>
        <div class="col-sm-6 text-right text-center-xs">
            <span class="type--fine-print">&copy;
                <span class="update-year"></span> Guia Localiza, Inc.</span>
                <a class="type--fine-print" href="{{ route('pages.view', 'politica-de-privacidade') }}" title="Politica de Privacidade">Politica de Privacidade</a>
                <a class="type--fine-print" href="{{ route('pages.view', 'termos-de-uso') }}" title="Termos de Uso">Termos de Uso</a>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</footer>
