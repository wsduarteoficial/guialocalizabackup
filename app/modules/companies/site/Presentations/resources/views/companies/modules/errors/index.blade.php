@extends('site::companies.modules.home.app')

@section('main-content')

<div class="main-container">

    <section class="cover imagebg height-80 text-center" data-overlay="3">
        <div class="background-image-holder">
            <img alt="background" src="theme/img/tourism-1.jpg" />
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-sm-12">
                    <span class="h1 inline-block">Localize</span>
                    <span class="h1 inline-block typed-text typed-text--cursor" data-typed-strings="Telefones!,Empresas!,Comércios!,Indústrias!,Profissionais Liberais!,Prestadores de Serviços!">

                    </span>
                    <p class="lead">
                        @desktop
                            Selecione a cidade para encontrar empresas, profissinais e lugares legais próximos a você.
                        @elsedesktop
                            Encontre empresas próximas a você.
                        @enddesktop

                    </p>
                    <div class="boxed boxed--lg bg--white text-left">
                        <form class="form--horizontal" action="{{ route('companies.search.home') }}" method="get">
                            <div class="col-sm-9 col-md-6">

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

                            <div class="col-sm-4">
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
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn--primary type--uppercase">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

</div>
@endsection
