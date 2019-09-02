class BaseCompanyView {


	selectPlan() {

		$(document).on('change', 'select[name="plan_id"]', function(){

    		$('#jq_click_alert_info').trigger('click');

			let value, valueOld;
			value = $(this).val();

			if(value > 1) {

				$('.show-buttons-free').removeClass('hide');
				$('.show-buttons-sponsors').addClass('hide');

			} else if(value <= 0) {

				$('.show-buttons-free').addClass('hide');
				$('.show-buttons-sponsors').addClass('hide');

			} else {

				$('.show-buttons-free').addClass('hide');
				$('.show-buttons-sponsors').removeClass('hide');

			}

			$('#show-panels').removeClass('hide');

			$(this).parents('#pulsate-regular').remove();

			$('#plan-not-pulsate').removeClass('hide');

			if(value > 1) {

				$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').removeClass('hide', function(){
					$(this).slideDown('slow');
				});

				$('.jq_data_required').attr('required', true);

			} else {

				$('#info-sponsors-01, #info-sponsors-02, #info-sponsors-03').addClass('hide');

				$('.jq_data_required').attr('required', false);

			}

			if (value <=0) {

				$('#show-panels').hide();
				$('#plan-not-pulsate').show();

			} else {
				$('#show-panels').show();
			}

			$('.jq_plan_id_register').find(`option[value="${value}"]`).attr("selected", "selected");


			// valueOld = localStorage.getItem('create_company_plan_id');

			// if (valueOld) {
			// 	$('.jq_plan_id_register').find(`option[value="${valueOld}"]`).attr("selected", "selected");
			// }

			// localStorage.setItem('create_company_plan_id', value);

			if (value > 1) {
				$('#note-info').removeClass('hide');
			} else {
				$('#note-info').addClass('hide');
			}

		});

	}

	addInputPhoneFixed(element) {

		$(element).on('click', function() {

			let html= `<div class="row margin-top-10 jq_input_fixed_prepend">
				<div class="col-md-10">
					<div class="input-group">
						<input type="text" value="" name="phone_fixed[]" class="form-control phone" placeholder="(xx) xxxx-xxxx">
						<span class="input-group-btn">
							<button class="btn default jq_input_phone_fixed_remove" type="button"><i class="fa fa-minus"></i></button>
						</span>
					</div>
				</div>
			</div>`;

			$('#input_phone_fixed_prepend').append(html);


		});

		$(document).on('click', '.jq_input_phone_fixed_remove', function() {
			$(this).parents('.jq_input_fixed_prepend').remove();
		});

	}

	addInputPhoneCell(element) {

		$(element).on('click', function() {

			let html = `<div class="row margin-top-10 jq_input_fixed_prepend">
				<div class="col-md-10">
					<div class="input-group">
						<input type="text" name="phone_cell[]" class="form-control phone" placeholder="(xx) x-xxxx-xxxx">
						<span class="input-group-btn">
							<button class="btn default jq_input_phone_cell_remove" type="button"><i class="fa fa-minus"></i></button>
						</span>
					</div>
				</div>
			</div>`;

			$('#input_phone_cell_prepend').append(html);

		});

		$(document).on('click', '.jq_input_phone_cell_remove', function() {
			$(this).parents('.jq_input_fixed_prepend').remove();
		});

	}

	addInputPhoneOthers(element) {

		$(element).on('click', function() {

			let html = `<div class="row margin-top-10 jq_input_others_prepend">
				<div class="col-md-10">
					<div class="input-group">
						<input type="text" name="phone_others[]" class="form-control phone">
						<span class="input-group-btn">
							<button class="btn default jq_input_phone_others_remove" type="button"><i class="fa fa-minus"></i></button>
						</span>
					</div>
				</div>
			</div>`;

			$('#input_phone_others_prepend').append(html);

		});

		$(document).on('click', '.jq_input_phone_others_remove', function() {
			$(this).parents('.jq_input_others_prepend').remove();
		});

	}

}
