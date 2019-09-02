<div class="page-toolbar">
    <!-- BEGIN THEME PANEL -->
    <div class="btn-group btn-theme-panel">
        <a href="javascript:;" id="jq_custom_search" title="Busca Personizada" class="btn dropdown-toggle" data-toggle="dropdown">
            <i class="icon-magnifier"></i> Busca Personalizada
        </a>
        <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="{{ route('admin.companies.search') }}" method="GET">
                        <div class="form-body light">
                            <div class="form-group">
                                <label>Utilize os parâmetros abaixo para localizar empresas</label>

                                <div class="input-icon margin-top-10">
                                    <i class="fa fa-building"></i>
                                    <input type="search" name="name_fantasy" class="form-control" placeholder="Nome da empresa">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="active" id="active-1" value="1"> Cadastro ativo
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="active" id="active-0" value="0"> Cadastro inativo
                                            <span></span>
                                        </label>

                                        <label class="mt-radio">
                                            <input type="radio" name="active" id="active-all" value="all" checked> Todos os Cadastros
                                            <span></span>
                                        </label>
                                    </div>

                                </div>

                                <div class="input-icon">
                                    <i class="fa fa-phone-square"></i>
                                    <input type="text" name="number_phone" class="form-control" placeholder="Telefone">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <div class="mt-radio-inline">

                                        <label class="mt-radio">
                                            <input type="radio" name="phone" id="phone-fixed" value="fixed"> Telefone Fixo
                                            <span></span>
                                        </label>

                                        <label class="mt-radio">
                                            <input type="radio" name="phone" id="phone-cell" value="cell"> Telefone Celular
                                            <span></span>
                                        </label>

                                        <label class="mt-radio">
                                            <input type="radio" name="phone" id="phone-all" value="all" checked> Todos os telefones
                                            <span></span>
                                        </label>

                                        <label class="mt-radio">
                                            <input type="radio" name="phone" id="phone-others" value="others"> Outros
                                            <span></span>
                                        </label>

                                    </div>

                                </div>

                                <div class="input-icon ">
                                    <i class="fa fa-rocket"></i>

                                    <select name="plan" class="form-control"></select>

                                </div>

                                <div class="input-icon margin-top-10">
                                    <i class="icon-social-dribbble"></i>

                                    <select name="category" class="form-control">
                                    </select>

                                </div>
                                <div class="input-icon margin-top-10">
                                    <i class="fa fa-th"></i>
                                    <select name="state" class="form-control"></select>
                                </div>
                                <div class="input-icon margin-top-10">
                                    <i class="fa fa-th-list"></i>
                                    <select name="city" class="form-control" disabled>
                                        <option value="">Selecione a Cidade</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="form-actions right">
                            <button type="submit" class="btn purple">Enviar</button>
                        </div>


                   </form>

                </div>
             </div>
        </div>
        <!-- END THEME PANEL -->
    </div>
</div>
