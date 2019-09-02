import { HttpService } from '../services/HttpService';

declare const PHONES_COMPANIES_SPONSORS: string;
declare const PHONES_TAG_SEARCH: string;
declare const PHONES_CATEGORIES_IDS: string;
declare const PHONES_SUBCATEGORIES_IDS: string;
declare const PHONES_STATE_SEARCH: string;
declare const PHONES_CITY_SEARCH: string;
declare const PHONES_TOTAL: string;
declare const PHONES_TOTAL_LINE: string;
declare const PHONES_MOBILE: string;

export class AdsView {

    public ads() {

        if (typeof PHONES_TAG_SEARCH === 'undefined') {
            return;
        }

        if (typeof PHONES_COMPANIES_SPONSORS === 'undefined') {
            return;
        }

        if (PHONES_COMPANIES_SPONSORS === 'False') {

            let dataTo, parameters, response;

            dataTo = {
                'companies_sponsors': PHONES_COMPANIES_SPONSORS,
                'categories_ids': PHONES_CATEGORIES_IDS,
                'subcategories_ids': PHONES_SUBCATEGORIES_IDS,
                'tag_search': PHONES_TAG_SEARCH,
                'state_search': PHONES_STATE_SEARCH,
                'city_search': PHONES_CITY_SEARCH,
                'total': PHONES_TOTAL,
                'total_line': PHONES_TOTAL_LINE
            };

            parameters ={
                url: '/companies/ajax/view/make/ads/search/',
                data: dataTo
            };

            response = HttpService.ajax(parameters);

            response.done(function(data) {
                AdsView._render(data);
            });

            response.fail(function() {
                //alert('Erro ao carregar dados do pedido!');
            });

        }

    }

    private static _render(data:any ='') {

        let html: any;
        let referrer: any;

        html = '';

        referrer = encodeURIComponent(window.location.href);

        if (PHONES_MOBILE == 'False') {

            if (data.length > 0) {

                html += '<div>Anúncios relacionados</div>';

                $.each(data, function(index: number, item) {
                    html += `
                        <div class="text-center sponsors">
                            <a href="/companies/ads/redirect/?company=${item.company_id}&banner=${item.id}&referer=${referrer}" target="_blank" style="cursor:pointer;">
                                <img src="/storage/uploads/companies/${item.company_id}/banners/right-side/${ item.image }" class="img-responsive">
                            </a>
                        </div>
                    `;
                });

            } else {

                html += '<div>Anúncios</div>';

                html += `
                        <div class="text-center sponsors">
                        <a href="/anuncie-gratis" target="_blank" style="cursor:pointer;">
                            <img src="/img/register.png" class="img-responsive">
                        </a>
                    </div>
                `;

            }

            $('.box-sponsors').html(html);

        }

        if (PHONES_MOBILE == 'True') {

            $('.box-sponsors').hide();

            let line = 0;

            $.each(data, function(index: number, item) {

                html = `
                    <div>Anúncios relacionados</div>
                        <a href="/companies/ads/redirect/?company=${item.company_id}&banner=${item.id}&referer=${referrer}" target="_blank" style="cursor:pointer;">
                            <img src="/storage/uploads/companies/${item.company_id}/banners/right-side/${ item.image }" class="img-responsive">
                        </a>
                    <hr>
                `;

                $('div.row.free-search').eq(line).prepend(html);

                line = line += 2;

                if (index > 2) {
                    line = line += 3;
                }

            });

        }

    }

}
