import { HttpService } from "../services/HttpService";
declare var PHONES_MOBILE: string;

export class PhoneNumberView {

	public viewPhone(el:string): any {

		$(el).on('click', function () {

			let dataTo, response;

			let obj = $(this);

			$(this).find('.btn__text').text('Aguarde...');
					
			dataTo = {
				'phone_id': obj.data('phone'),
				'company_id': obj.data('company')
			};
	
			let parameters = {
				data: dataTo,
				url: '/companies/ajax/view/phone/'
			};

			response = HttpService.ajax(parameters);

			response.done(function (data) {

				let style: string;				
				let sponsors: boolean;
				let html: string;

				sponsors = obj.data('sponsors');
		
				if (sponsors === true) {
					style = 'padding: 0; text-align: letf; margin-left:15px;';
				} else {
					style = 'margin-left:15px; text-align: letf';
				}

				if (PHONES_MOBILE == 'True') {					

					html = `
					<div class="row phone">
						<div class="col-xs-12 col-sm-8 col-xs-8">
							<div style="margin:0 0 0 12px;">
								<a href="tel:${ data.number_mobile }">
									<strong>${ data.number_mask }</strong>
								</a>							
							</div>						
						</div>

						<div class="col-xs-12 col-sm-4 col-xs-4">
							<div class="row text-left" style="margin:-15px -10px 0 0;">
								<a href="tel:${ data.number_mobile }">
									<span class="btn btn-success btn--xs btn__text turn-on">Ligar</span>
								</a>
							</div>
						</div>
					
					</div>`;
				

				} else {

					html = `
					<div class="row phone">
						<div class="col-sm-12 col-xs-12">
							<div style="${ style }">
								<a href="tel:${ data.number_mobile }">
									<strong>${ data.number_mask }</strong>
								</a>
							</div>
						</div>
					</div>`;

				}	
		
				obj.fadeOut(150)
					.html(html)
					.fadeIn(100);

			});

			response.fail(function () {
				alert('Erro ao carregar dados do pedido!');
			});

		});

	}

}
