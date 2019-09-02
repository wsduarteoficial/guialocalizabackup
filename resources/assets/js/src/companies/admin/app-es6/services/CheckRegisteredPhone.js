class CheckRegisteredPhone {

	static fixed() {

		$(document).on('blur', 'input[name="phone_fixed[]"]', function () {

			let number = $(this).val();
			let element = $(this);

			if (number.length >= 10) {
				CheckRegisteredPhone._check(number, element);
			}

		});

	}

	static cell() {

		$(document).on('blur', 'input[name="phone_cell[]"]', function () {

			let number = $(this).val();
			let element = $(this);

			if (number.length >= 11) {
				CheckRegisteredPhone._check(number, element);
			}

		});

	}

	static others() {

		$(document).on('blur', 'input[name="phone_others[]"]', function () {

			let number = $(this).val();
			let element = $(this);		

			if (number.length > 1) {
				CheckRegisteredPhone._check(number, element);
			}

		});

	}

	static _check(number, element) {

		let numberCheckDb = number.replace(/[^\d]+/g,'');
		let company_id = $('meta[name="company_id"]').attr("content");

		let parameters = {
			data: { 
				company_id: company_id,
				number: numberCheckDb 
			},
			url: '/admin/ajax/phone/check/'
		};

		let response = HttpService.ajax(parameters);

		response.done((obj) => {                    

			Object.keys(obj).forEach(key => {
				let value = obj[key];
				Object.keys(value).forEach(key => {
					let v = value[key];
					if (v.name_fantasy !=='undefined' && v.name_fantasy) {
						CheckRegisteredPhone.boxSwal(element, v.name_fantasy, number, v.pivot.company_id)
					}
				});

			});

		});

		response.fail(() => {
			//alert('Houve um erro na solicitação do pedido, tente novamente!');
			//location.reload();
		});

	}

	static boxSwal(element, nameCompany, number, company_id) {
	
		swal({

			title: `Números <span style='color:red'><strong>${number}</strong></span> já cadastrado em nome <br />de <b> <a href="/admin/empresa/${ company_id }/editar" target="_BLANK">${nameCompany} </a></b>.`,
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

		},
		function (isConfirm) {

			if (!isConfirm) {

				element.val('');

				swal({
					html: true,
					title: "Cancelado!",
					text: `Cadastro de telefone cancelado com sucesso.`,
					type: "success"
				});

			}

		});

	}

}
