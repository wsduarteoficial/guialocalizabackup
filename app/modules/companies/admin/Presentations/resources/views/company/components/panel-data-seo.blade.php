<div class="panel panel-default">
    <div class="panel-heading bold"> Otimização para buscadores (SEO) <a href="https://static.googleusercontent.com/external_content/untrusted_dlcp/www.google.com/pt-BR//intl/pt-BR/webmasters/docs/guia-otimizacao-para-mecanismos-de-pesquisa-pt-br.pdf" target="_blank" class="btn btn-circle btn-xs grey-cascade" data-toggle="tooltip" title="Guia do Google para Iniciantes"><i class="fa fa-link"></i> Guia</a></div>
    <div class="panel-body form-horizontal">                        

        <div class="form-body">
            <div class="form-group">
                <label class="col-md-2 control-label">Tag Title</label>
                <div class="col-md-9">
                    <input id="id_title" type="text" name="tag_title" value="{{ isset( $company->tag_title ) ? $company->tag_title : ''}}" class="form-control">                                         
                    <span class="pull-right" id="titleCont">0 caracteres</span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 control-label">Meta Tag Description</label>
                <div class="col-md-9">
                    <textarea id="id_description" name="tag_description" class="form-control" rows="3">{{ isset( $company->tag_description ) ? $company->tag_description : ''}}</textarea>
                        <span class="pull-right" id="descCont">0 caracteres</span> 
                </div>
            </div>

        </div>                  

    </div>
</div>