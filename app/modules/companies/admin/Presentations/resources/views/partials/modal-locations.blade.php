<!-- /.modal -->
<div class="modal fade modal-locations" tabindex="-1" data-width="400">

    <div class="modal-dialog">
        <div class="modal-content">

            <form id="form-locations" action="" method="post">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title bold"><i class="fa fa-filter"></i> <span class="jq_name_location"></span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="input-icon margin-top-10">
                                <i class="fa fa-th"></i>
                                <select id="jq_combo_location_state" name="state" class="form-control" required="required">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="jq_div_combo_location_city" class="row hide">
                        <div class="col-md-12">
                            <div class="input-icon margin-top-10">
                                <i class="fa fa-th-list"></i>
                                <select id="jq_combo_location_city" name="city" class="form-control" disabled>
                                    <option value="">Selecione a Cidade</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="jq_location_route" name="location_route" value="">
                    <input type="hidden" id="jq_modal_remove_city" name="modal_remove_city" value="">
                    <input type="hidden" id="target_route" name="target_route" value="">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Fechar</button>
                    <button type="submit" class="btn green">Buscar</button>
                </div>

            </form>

        </div>
    </div>
</div>
