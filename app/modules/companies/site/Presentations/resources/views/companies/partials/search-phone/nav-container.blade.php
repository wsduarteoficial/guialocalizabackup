<div class="nav-container ">
    <div class="bar bg--dark bar--sm visible-sm visible-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-3 col-sm-2">
                    <a href="{{ url('/')}}" rel="nofollow" title="Volta ao Início">
                        <img class="logo logo-dark" alt="logo" src="{{ asset('/storage/uploads/logos-app/logo.png') }}"/>
                        <img class="logo logo-light" alt="logo" src="{{ asset('/storage/uploads/logos-app/logo.png') }}"/>
                    </a>
                </div>
                <div class="col-xs-9 col-sm-10 text-right">
                    <a href="#" class="hamburger-toggle" data-toggle-class="#menu4;hidden-xs hidden-sm">
                        <i class="icon icon--sm stack-interface stack-menu"></i>
                    </a>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </div>
    <!--end bar-->
    <nav class="bar bar--sm bg--dark" id="menu4">
        <form id="form-search-phone" action="{{ route('companies.search.home') }}" method="get">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 hidden-xs hidden-sm">
                        <div class="bar__module">
                            <a href="{{ url('/')}}" rel="nofollow" title="Volta ao Início">
                                <img class="logo logo-dark" alt="logo" src="{{ asset('/storage/uploads/logos-app/logo.png') }}"/>
                                <img class="logo logo-light" alt="logo" src="{{ asset('/storage/uploads/logos-app/logo.png') }}"/>
                            </a>
                        </div>
                        <!--end module-->
                    </div>
                    <div class="col-md-4">
                        <div class="bar__module">

                             @desktop
                                
                               <input type="search" placeholder="O que deseja pesquisar?"
                               oninvalid="this.setCustomValidity('Informe a palavra chave!')"
                               oninput="setCustomValidity('')" value="{{ Request::get('q')}}" name="q"
                               required="autofocus'" id="autocomplete"/>
                            @elsedesktop
                           
                               <input type="search" placeholder="O que deseja pesquisar?"
                               oninvalid="this.setCustomValidity('Informe a palavra chave!')"
                               oninput="setCustomValidity('')" value="{{ Request::get('q')}}" name="q"
                               required="autofocus'"/>
                            @enddesktop


                        </div>

                    </div>
                    <!--end columns-->
                    <div class="col-md-4">

                        <div class="bar__module">
                            <div class="input-select">

                                <input type="hidden" name="state" value="0">

                                <select name="city" id="phone_city" required="Em qual cidade?"
                                        oninvalid="this.setCustomValidity('Qual cidade deseja efetuar a busca?')"
                                        oninput="setCustomValidity('')">

                                    <option selected="selected" value="">Em qual cidade?</option>

                                    @if(isset($states))

                                        @foreach($states as $state)

                                            @foreach($state->cities as $city)
                                                <option value="{{ $city->id }}"
                                                        data-state="{{ $state->id }}">{{ $city->name }}
                                                    - {{ $state->abbr }}</option>
                                            @endforeach

                                        @endforeach

                                    @endif

                                    <option selected="selected" value="0">Todas as cidades</option>

                                </select>
                            </div>
                        </div>

                    </div>

                    @php
                    /*

                    <div class="col-md-3">

                        <div class="bar__module">
                            <div class="input-select">

                                <select name="service" id="service" required
                                        oninvalid="this.setCustomValidity('Qual serviço deseja efetuar a busca?')"
                                        oninput="setCustomValidity('')">

                                    <option selected="selected" value="">Telefone ou Classificado?</option>
                                    <option value="phone">Telefone</option>
                                    <option value="classified">Classificado</option>

                                </select>

                            </div>
                        </div>

                    </div>
                    */
                    @endphp

                    <!--end columns-->
                    <div class="col-md-2 text-right text-right-xs">
                        <div class="bar__module">
                            <button type="submit" id="submit" class="btn btn--primary btn__text btn--sm btn-block type--uppercase">
                                Pesquisar
                            </button>
                        </div>
                        <!--end module-->
                    </div>
                    <!--end columns-->
                </div>
                <!--end of row-->
            </div>
            <!--end of container-->

        </form>
    </nav>
</div>
