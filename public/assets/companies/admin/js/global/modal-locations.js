'use strict';

$(document).ready(function () {

	$('.jq_locations').on('click', function () {

		var elemState = void 0,
		    optionState = void 0;

		localStorage.removeItem('filter_admin_city_id');
		localStorage.removeItem('filter_admin_state_id');

		$('.jq_name_location').text($.trim($(this).text()));
		$('#jq_location_route').val($(this).data('route'));
		$('#jq_modal_remove_city').val($(this).data('city'));

		if ($(this).data('city')) {
			$('#jq_div_combo_location_city').addClass('hide');
		} else {
			$('#jq_div_combo_location_city').removeClass('hide');
		}

		if ($(this).data('opentarget')) {
			$('#target_route').val($(this).data('opentarget'));
		}

		elemState = $('#jq_combo_location_state');

		$.ajax({

			url: '/admin/ajax/state/active/',
			type: 'GET',
			data: '',
			dataType: 'json',
			complete: function complete(xhr, textStatus) {},
			success: function success(data, textStatus, xhr) {
				elemState.html('<option value="">Selecione o Estado</option>');

				data.forEach(function (item) {
					optionState = $('<option>').val(item.id).text(item.name);
					elemState.append(optionState);
				});
			},
			error: function error(xhr, textStatus, errorThrown) {
				//alert('Houve um erro ao carregar Estados do servidor!');
			}

		});
	});

	$('#jq_combo_location_state').bind('change', function () {

		var elemCity = void 0,
		    optionCity = void 0,
		    stateId = void 0,
		    cityId = void 0,
		    removeCity = void 0;

		stateId = $(this).val();

		elemCity = $('#jq_combo_location_city');
		removeCity = $('input[name="modal_remove_city"]').val();
		removeCity = removeCity ? true : false;

		if (stateId <= 0) {
			elemCity.attr('disabled', 'disabled');
			elemCity.html('<option value="">Selecione a Cidade</option>');
			return false;
		}

		if (removeCity === false) {

			/* Act on the event */
			$.ajax({

				url: '/admin/ajax/city/active/',
				type: 'GET',
				dataType: 'json',
				data: { state_id: stateId },

				complete: function complete(xhr, textStatus) {
					//called when complete
				},
				success: function success(data, textStatus, xhr) {

					elemCity.removeAttr('disabled');
					elemCity.attr('required', 'required');
					elemCity.html('<option value="">Selecione a Cidade</option>');

					data.forEach(function (item) {
						optionCity = $('<option>').val(item.id).text(item.name);
						elemCity.append(optionCity);
					});
				},
				error: function error(xhr, textStatus, errorThrown) {
					//alert('Houve um erro ao carregar Cidades do servidor!');
				}
			});
		}
	});

	$(document).on('change', '#jq_combo_location_state', function () {
		localStorage.setItem('filter_admin_state_id', $(this).val());
	});

	$(document).on('change', '#jq_combo_location_city', function () {
		localStorage.setItem('filter_admin_city_id', $(this).val());
	});

	$('#form-locations').submit(function (event) {
		event.preventDefault();

		var cityId = void 0,
		    stateId = void 0,
		    locationRoute = void 0,
		    route = void 0,
		    targetRoute = void 0;

		stateId = localStorage.getItem('filter_admin_state_id');
		cityId = localStorage.getItem('filter_admin_city_id');

		targetRoute = $('input[name="target_route"]').val();
		locationRoute = $('input[name="location_route"]').val();

		if (cityId > 0 && stateId > 0) {
			route = locationRoute + '/' + cityId;
		} else if (stateId > 0) {
			route = locationRoute + '/' + stateId;
		} else {
			return false;
		}

		localStorage.removeItem('filter_admin_state_id');
		localStorage.removeItem('filter_admin_city_id');

		if (targetRoute) {
			window.open(route, targetRoute);
		} else {
			window.location = route;
		}
	});
});
//# sourceMappingURL=modal-locations.js.map