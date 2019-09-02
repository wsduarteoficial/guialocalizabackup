'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CheckRegisteredPhone = function () {
	function CheckRegisteredPhone() {
		_classCallCheck(this, CheckRegisteredPhone);
	}

	_createClass(CheckRegisteredPhone, null, [{
		key: 'fixed',
		value: function fixed() {

			$(document).on('blur', 'input[name="phone_fixed[]"]', function () {

				var number = $(this).val();
				var element = $(this);

				if (number.length >= 10) {
					CheckRegisteredPhone._check(number, element);
				}
			});
		}
	}, {
		key: 'cell',
		value: function cell() {

			$(document).on('blur', 'input[name="phone_cell[]"]', function () {

				var number = $(this).val();
				var element = $(this);

				if (number.length >= 11) {
					CheckRegisteredPhone._check(number, element);
				}
			});
		}
	}, {
		key: 'others',
		value: function others() {

			$(document).on('blur', 'input[name="phone_others[]"]', function () {

				var number = $(this).val();
				var element = $(this);

				if (number.length > 1) {
					CheckRegisteredPhone._check(number, element);
				}
			});
		}
	}, {
		key: '_check',
		value: function _check(number, element) {

			var numberCheckDb = number.replace(/[^\d]+/g, '');
			var company_id = $('meta[name="company_id"]').attr("content");

			var parameters = {
				data: {
					company_id: company_id,
					number: numberCheckDb
				},
				url: '/admin/ajax/phone/check/'
			};

			var response = HttpService.ajax(parameters);

			response.done(function (obj) {

				Object.keys(obj).forEach(function (key) {
					var value = obj[key];
					Object.keys(value).forEach(function (key) {
						var v = value[key];
						if (v.name_fantasy !== 'undefined' && v.name_fantasy) {
							CheckRegisteredPhone.boxSwal(element, v.name_fantasy, number, v.pivot.company_id);
						}
					});
				});
			});

			response.fail(function () {
				//alert('Houve um erro na solicitação do pedido, tente novamente!');
				//location.reload();
			});
		}
	}, {
		key: 'boxSwal',
		value: function boxSwal(element, nameCompany, number, company_id) {

			swal({

				title: 'N\xFAmeros <span style=\'color:red\'><strong>' + number + '</strong></span> j\xE1 cadastrado em nome <br />de <b> <a href="/admin/empresa/' + company_id + '/editar" target="_BLANK">' + nameCompany + ' </a></b>.',
				text: "Deseja criar novo cadastro usando o mesmo número?",
				type: "warning",
				html: true,

				showCancelButton: true,
				cancelButtonClass: "btn-danger",
				cancelButtonText: "NÃO",
				confirmButtonClass: "btn-success",
				confirmButtonText: "SIM",
				closeOnConfirm: true,
				closeOnCancel: false

			}, function (isConfirm) {

				if (!isConfirm) {

					element.val('');

					swal({
						html: true,
						title: "Cancelado!",
						text: 'Cadastro de telefone cancelado com sucesso.',
						type: "success"
					});
				}
			});
		}
	}]);

	return CheckRegisteredPhone;
}();
//# sourceMappingURL=CheckRegisteredPhone.js.map