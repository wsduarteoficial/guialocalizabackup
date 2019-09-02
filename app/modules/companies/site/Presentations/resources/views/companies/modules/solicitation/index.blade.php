@extends('site::companies.modules.solicitation.app')

@php
$place_name = '';
if(isset($company->place->name)):
    $place_name = $company->place->name;
endif;

$zip_code = '';
if(isset($company->zipcode->code)):
    $zip_code = $company->zipcode->code;
endif;

$state_abbr = $state_name  ='';
if(isset($company->state->abbr)):
    $state_abbr = $company->state->abbr;
    $state_name = $company->state->name;
endif;

$city_name = '';
if(isset($company->city->name)):
    $city_name = $company->city->name;
endif;

$district_name = '';
if(isset($company->district->name)):
    $district_name = $company->district->name;
endif;
@endphp

@section('main-content')
<div class="main-container">

    <section class="switchable page-margin-mobile">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">    
             
                    <div class="row switchable__text ">

                        <form name="solicitation" action="#" method="post">

                            {{ csrf_field() }}

                            <p class="lead">

                            Envie a <strong>Solicitação de Alteração</strong> pelo formulário abaixo. 
                            <br>    
                            Nos esforçamos para atender a todas as soliticações em até 72 horas, nos dias úteis.
                            </p>

                            <hr class="short">                         
                            <div class="row boxed bg--secondary boxed--lg boxed--border">
                                <h3>Dados de Contato</h3>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Seu Nome Completo:</label>
                                        <input type="text" name="name_contact" data-js="name-contact" required="required" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Seu e-mail:</label>
                                        <input type="email" name="email_contact" data-js="email-contact" required="required" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Assunto:</label>
                                        <input type="text" name="subject_contact" data-js="subject-contact" value="Solicitação de Alteração de Cadastro" required="required" disabled="disabled" />
                                    </div>                                            
                                </div>                                            

                            </div>

                            <div class="row boxed bg--secondary boxed--lg boxed--border">
                                <h3>Dados da Empresa (Busca no Site)</h3>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Nome Fantasia:</label>
                                        <input type="text" name="name_fantasy" value="{{ $company->name_fantasy }}" data-js="name-fantasy" required="required" />
                                    </div>

                                    <div class="col-sm-12">
                                        <label>Descrição ou Slogan:</label>
                                        <textarea rows="4" name="description" data-js="description" required="required" >{{ $company->description }}</textarea>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <label>Categoria:</label>

                                        @php
                                            $category_id = false;
                                        @endphp
                    
                                        @if( isset($company->categories) )
                    
                                            @foreach($company->categories as $category)
                                                @php
                                                    $category_id = $category->id;
                                                @endphp
                                            @endforeach
                    
                                        @endif
                                        <select name="category" data-js="category" required="required">
                                            <option value="">Selecione a categoria</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}" {{ tools_selected($category->id, $category_id ) }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>    
                                    </div>                               
                                </div>                           

                            </div>

                            <div class="row boxed bg--secondary boxed--lg boxed--border">
                                
                                <h3>Informações Telefônicas</h3>
                                <div class="row">
                                                           
                                    @php
                                    $collection = collect($company->phones);
                                    $sorted = $collection->sortBy('number');
                
                                    $phone_fixed ='';
                                    foreach($sorted->values()->all() as $phone):
                                        if($phone->type=='fixed'):
                                        $phone_fixed .= tools_mask($phone->number, '(##) ####-####') . "\r\n";
                                        endif;
                                    endforeach;

                                    $phone_cell ='';
                                    foreach($sorted->values()->all() as $phone):
                                        if($phone->type=='cell'):
                                        $phone_cell .= tools_mask($phone->number, '(##) #####-####') . "\r\n";
                                        endif;
                                    endforeach;

                                    $phone_others ='';
                                    foreach($sorted->values()->all() as $phone):
                                        if($phone->type=='others'):
                                        $phone_others .= $phone->number . "\r\n";
                                        endif;
                                    endforeach;
                                    @endphp

                                    <div class="col-md-4">
                                        <label>Telefone Fixo:</label>
                                        <textarea rows="4" name="phone_fixed" data-js="phone-fixed">{{ $phone_fixed }}</textarea>
                                    </div>  

                                    <div class="col-md-4">
                                        <label>Telefone Celular:</label>
                                        <textarea rows="4" name="phone_cell" data-js="phone-cell">{{ $phone_cell }}</textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Outros:</label>
                                        <textarea rows="4" name="phone_others" data-js="phone-others">{{ $phone_others }}</textarea>
                                    </div> 

                                </div>                           

                            </div>

                            <div class="row boxed bg--secondary boxed--lg boxed--border">
                                
                                <h3>Endereço Físico da Empresa</h3>
                                
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>Endereço:</label>
                                        <input type="text" name="address" value="{{ $place_name }}" data-js="address" required="required" />
                                    </div> 

                                    <div class="col-md-2">
                                        <label>Número:</label>
                                        <input type="text" name="number" value="{{ $company->numeral }}" data-js="number" required="required" />
                                    </div> 

                                    <div class="col-md-4">
                                        <label>Complemento:</label>
                                        <input type="text" name="complement" value="{{ $company->complement }}" data-js="complement" />
                                    </div> 

                                </div> 

                                <div class="row">

                                    <div class="col-md-4">
                                        <label>Bairro:</label>
                                        <input type="text" name="district" value="{{ $district_name }}" data-js="district" required="required" />
                                    </div> 

                                    <div class="col-md-2">
                                        <label>Cep:</label>
                                        <input type="text" name="cep" value="{{ $zip_code }}" data-js="cep" required="required" />
                                    </div> 

                                    <div class="col-md-4">
                                        <label>Cidade:</label>
                                        <input type="text" name="city" value="{{ $city_name }}" data-js="city" required="required" />
                                    </div> 

                                    <div class="col-md-2">
                                        <label>Estado:</label>
                                        <input type="text" name="abbr" value="{{ $state_abbr }}" data-js="abbr" required="required" />
                                    </div> 

                                </div>                      

                            </div>

                            <div class="row boxed bg--secondary boxed--lg boxed--border">
                                
                                <h3>Observações</h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea rows="4" name="comments" data-js="comments"></textarea>
                                    </div>                           
                                </div>                           

                            </div>

                            <div class="row">
                                 <div class="col-sm-5 col-md-4 pull-left">
                                    <button type="submit" data-js="send-message" class="btn btn--primary type--uppercase">Enviar Solicitação</button>
                                </div>
                            </div>

                            <input type="hidden" name="url_company" value="{{ $url_company }}" />
                            <input type="hidden" name="company_id" value="{{ $company->id }}" />
                            <input type="hidden" name="aspam" data-js="anti-spam" />

                        </form>

                        <!--end of row-->
                    </div>
                    <!--end of row-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

</div>


@endsection

@section('breadcrumbs')

{!! tools_breadcrumbs(route('site.index'), 'Home', false) !!}
{!! tools_breadcrumbs(null, 'Solicitação de Alteração', false) !!}

@endsection
