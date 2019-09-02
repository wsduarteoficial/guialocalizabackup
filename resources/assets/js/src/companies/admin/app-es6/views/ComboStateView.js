class ComboStateView {

    static states(result) {

        let element, selected, stateId;
        element = $('select[name="state"]');
        stateId = $.urlParam('state');

        result.done((data) => {

            element.html('<option value="">Selecione o Estado</option>');

            data.forEach((item) => {

                let optionState;

                if(stateId > 0) {

                    if(item.id == stateId) {
                        selected = true;
                    } else {
                        selected = false;
                    }

                    optionState = $('<option>')
                            .val(item.id)
                            .text(item.name)
                            .attr("selected", selected);

                } else {

                    optionState = $('<option>')
                            .val( item.id )
                            .text( item.name );

                }

                element.append(optionState);

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Estados do servidor!');
        });

    }

    static states_company_edit() {

        let element, selected, stateId;
        element = $('select[name="state_id"]');
        stateId = $('meta[name="state_id"]').attr("content");

        let parameters = {
            url: '/admin/ajax/state/active/'
        };

        let result = HttpService.ajax(parameters);

        element.removeAttr('disabled');

        result.done((data) => {

            element.html('<option value="">Selecione o Estado</option>');

            data.forEach((item) => {

                let optionState;

                if(stateId > 0) {

                    if(item.id == stateId) {
                        selected = true;
                    } else {
                        selected = false;
                    }

                    optionState = $('<option>')
                            .val(item.id)
                            .text(item.name)
                            .attr("selected", selected);

                } else {

                    optionState = $('<option>')
                            .val( item.id )
                            .text( item.name );

                }

                element.append(optionState);

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Estados do servidor!');
        });

    }

    static report_states(result) {

        let element, selected, stateId;
        element = $('select[name="state"]');

        element.html('<option value="">Selecione o Estado</option>');

        result.done((data) => {

            data.forEach((item) => {

                let optionState;

                if(stateId > 0) {

                    if(item.id == stateId) {
                        selected = true;
                    } else {
                        selected = false;
                    }

                    optionState = $('<option>')
                            .val(item.id)
                            .text(item.name)
                            .attr("selected", selected);

                } else {

                    optionState = $('<option>')
                            .val( item.id )
                            .text( item.name );

                }

                element.append(optionState);

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Estados do servidor!');
        });

    }

}
