class ComboPlanView {

    static plans(result, list=true) {

        let element, plan, selected;

        plan = $.urlParam('plan');

        element = $('select[name="plan"]');

        result.done((data) => {

            element.removeAttr('disabled');

            if (list===true) {
                element.html('<option value="">Planos</option>');
            } else {
                element.html('<option value="0">Selecione o plano</option>');
            }

            data.forEach((item) => {

                let optionPlan;

                if(plan > 0) {

                    if(item.id == plan) {
                        selected = true;
                    } else {
                        selected = false;
                    }

                    optionPlan = $('<option>')
                            .val(item.id)
                            .text(item.name)
                            .attr("selected", selected);

                } else {

                    optionPlan = $('<option>')
                            .val( item.id )
                            .text( item.name );

                }

                element.append( optionPlan );

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Planos do servidor!');
        });

    }

    static companies_plans(result, value_selected) {

        let element, selected;

        element = $('select[name="plan_id"]');

        result.done((data) => {

            element.removeAttr('disabled');

            element.html('<option value="">Selecione o plano</option>');

            data.forEach((item) => {

                let optionPlan;

                if(value_selected > 0) {

                    if(item.id == value_selected) {
                        selected = true;
                    } else {
                        selected = false;
                    }

                    optionPlan = $('<option>')
                            .val(item.id)
                            .text(item.name)
                            .attr("selected", selected);

                } else {

                    optionPlan = $('<option>')
                            .val( item.id )
                            .text( item.name );

                }

                element.append( optionPlan );

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Planos do servidor!');
        });

    }

    static report_plans(result) {

        let element, selected;

        element = $('select[name="plan"]');

        result.done((data) => {

            element.removeAttr('disabled');

            element.html('<option value="">Selecione o plano</option>');

            data.forEach((item) => {

                let optionPlan;

                optionPlan = $('<option>')
                        .val( item.id )
                        .text( item.name );

                element.append( optionPlan );

            });

        });

        result.fail(() => {
            //alert('Houve um erro ao carregar Planos do servidor!');
        });

    }

}
