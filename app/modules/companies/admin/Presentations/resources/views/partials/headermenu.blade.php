<!-- BEGIN HEADER MENU -->
<div class="page-header-menu">
    <div class="container-fluid">
        <!-- BEGIN HEADER SEARCH BOX -->
        <form class="search-form" action="{{ route('admin.companies.search') }}" method="GET">
            <div class="input-group">
                <input type="search" id="search-menu" class="form-control" placeholder="Busca raṕida" name="name_fantasy">
                <span class="input-group-btn">
                <a href="javascript:;" class="btn submit">
                <i class="icon-magnifier"></i>
                </a>
                </span>
            </div>
        </form>
        <!-- END HEADER SEARCH BOX -->
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu">
            <ul class="nav navbar-nav">
                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
                    <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i> Home
                    <span class="arrow"></span>
                    </a>
                </li>

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;">
                    <i class="fa fa-building"></i> Empresas
                    <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.companies.create') }}" class="nav-link"> Criar Empresa  </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.companies.active') }}" class="nav-link"> Listar Empresas (Ativas)  </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.companies.inactive') }}" class="nav-link"> Listar Empresas (Inativas)  </a>
                        </li>

                        @can('isAdmin')
                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.companies.trashed') }}" class="nav-link"> Lixeira </a>
                        </li>
                        @endcan
                    </ul>
                </li>          

                @can('isAdmin')
                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:" onclick="alert('Serviço indisponível no momento!');">
                        <i class="fa fa-rocket"></i> Clientes
                        <span class="arrow"></span>
                    </a>
                </li>
                
                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="{{ route('admin.categories.all') }}">
                        <i class="icon-social-dribbble"></i> Categorizações
                    </a>

                </li>
                @endcan

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;">
                        <i class="fa fa-map-marker"></i> Localizações
                        <span class="arrow"></span>
                    </a>

                    <ul class="dropdown-menu pull-left">

                        @can('isAdmin')

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.states.all') }}" class="nav-link"> Estados </a>
                        </li>
                        <li aria-haspopup="true" class=" ">
                            <a href="#" data-route="{{ route('admin.cities.all') }}" data-city="true" data-target=".modal-locations" class="jq_locations" data-toggle="modal" class="nav-link" data-name=""> Cidades  </a>
                        </li>
                        @endcan

                        <li aria-haspopup="true" class=" ">
                            <a href="#" data-route="{{ route('admin.districts.all') }}" data-target=".modal-locations" class="jq_locations" data-toggle="modal" class="nav-link"> Bairros  </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="#" data-route="{{ route('admin.zipcodes.all') }}" data-target=".modal-locations" class="jq_locations" data-toggle="modal" class="nav-link"> Ceps  </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="#" data-route="{{ route('admin.places.all') }}" data-target=".modal-locations" class="jq_locations" data-toggle="modal" class="nav-link"> Logradouros  </a>
                        </li>
                    </ul>
                </li>               

                @can('isAdmin')

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown jq_menu_hide_in_search">
                    <a href="javascript:;">
                    <i class="fa fa-cogs"></i> Configurações
                    <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left" style="min-width: 230px">
                        <li aria-haspopup="true" class="">
                            <a href="{{ route('admin.pages.all') }}" class="nav-link">
                                <i class="fa fa-file-word-o"></i> Páginas de Conteúdo
                            </a>
                        </li>
                        <li aria-haspopup="true" class="">
                            <a href="{{ route('admin.settings.logos') }}" class="nav-link">
                                <i class="fa fa-file-image-o"></i> Alterar Logo
                            </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.settings.socials') }}" class="nav-link">
                                <i class="fa fa-share-alt"></i> Redes Sociais
                            </a>
                        </li>

                        <li aria-haspopup="true" class="dropdown-submenu ">
                            <a href="javascript:;" class="nav-link nav-toggle ">
                            <i class="icon-users"></i> Usuários
                            <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li aria-haspopup="true" class=" ">
                                    <a href="{{ route('admin.users.create') }}" class="nav-link ">
                                    <i class="fa fa-user-plus"></i> Cadastrar Usuário </a>
                                </li>
                                <li aria-haspopup="true" class=" ">
                                    <a href="{{ route('admin.users.all') }}" class="nav-link ">
                                    <i class="fa fa-users"></i> Listar Usuários </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                @endcan

                @can('isAdmin')

                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown jq_menu_hide_in_search">
                    <a href="javascript:;">
                    <i class="fa fa-bar-chart"></i> Relatórios
                    <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.reports.company.registers') }}" class="nav-link"> Relatório de Empresas  </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.reports.company.status') }}" class="nav-link"> Relatórios de Cadastro Ativos e Inativos  </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.reports.company.plans') }}" class="nav-link"> Relatório de Planos  </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.reports.company.payments') }}" class="nav-link"> Relatório de Vencimentos  </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.reports.company.clicks') }}" class="nav-link"> Relatórios de Cliques de Visualização de Telefones  </a>
                        </li>


                        <li aria-haspopup="true" class=" ">
                            <a href="{{ route('admin.reports.company.search') }}" class="nav-link"> Relatório de Buscas   </a>
                        </li>

                        <li aria-haspopup="true" class=" ">
                            <a href="#" onclick="alert('Serviço indisponível no momento!');" class="nav-link"> Relatório de Registros de Atividades</a>
                        </li>
                    </ul>
                </li>

                @endcan
            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>
<!-- END HEADER MENU -->
