class CheckExistsPhoneEmpty {

	static fixed() {

		$(document).on('blur', 'input[name="phone_fixed[]"]', function () {

			let number = $(this).val();

			if (number.length >= 10) {
				CheckRegisteredPhone._check(number);
			}

		});

	}

	static cell() {

		$(document).on('blur', 'input[name="phone_cell[]"]', function () {

			let number = $(this).val();

			if (number.length >= 11) {
				CheckRegisteredPhone._check(number);
			}

		});

	}

	static others() {

		$(document).on('blur', 'input[name="phone_others[]"]', function () {

			let number = $(this).val();

			if (number.length > 1) {
				CheckRegisteredPhone._check(number);
			}

		});

	}

	static _check(number) {

		let numberCheckDb = number.replace(/[^\d]+/g,'');		

		let parameters = {
			data: { number: numberCheckDb } ,
			url: '/admin/ajax/phone/check/'
		};

		let response = HttpService.ajax(parameters);

		response.done((obj) => {                    

			Object.keys(obj).forEach(key => {
				let value = obj[key];
				Object.keys(value).forEach(key => {
					let v = value[key];
					if (v.name_fantasy !=='undefined' && v.name_fantasy) {
						CheckRegisteredPhone.boxSwal(v.name_fantasy, number)
					}
				});
			});			  
		});

		response.fail(() => {
			//alert('Houve um erro na solicitação do pedido, tente novamente!');
			//location.reload();
		});

	}

	static boxSwal(nameCompany, number) {
	
		swal({
			title: `Número <span style='color:red'><strong>${number}</strong></span> já cadastrado em nome <br />de <b>${nameCompany}</b>.`,
			text: "Deseja criar novo cadastro usando o mesmo número?",
			type: "warning",
			html: true,

			showCancelButton: true,
			cancelButtonClass: "btn-danger",
			cancelButtonText: "NÃO",
			confirmButtonClass: "btn-success",
			confirmButtonText: "SIM",
			closeOnConfirm: false,
			closeOnCancel: false

		},
		function (isConfirm) {

			if (isConfirm) {

				swal({
					html: true,
					title: "ATENÇÃO!",
					text: `O número <span style='color:red'><strong>${number}</strong></span> será removido de <b>${nameCompany}</b> e adicionado a este novo cadastro.`,
					type: "warning"
				});

			} else {

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
