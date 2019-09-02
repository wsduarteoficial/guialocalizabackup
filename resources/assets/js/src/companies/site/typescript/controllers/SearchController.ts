import { BaseController } from './BaseController';
import {AdsView} from '../views/AdsView';
import {PhoneNumberView} from '../views/PhoneNumberView';

export class SearchController extends BaseController {

    private static _complete() {
        return super.complete();
    }

	private static _registerIdCity() {
        return super.registerIdCity();
    }

	private static _readLocalStorageCombo() {
        return super.readLocalStorageCombo();
    }

    private static _loadResponse() {
        $("section [data-load='true']").fadeIn(500);
        $('#loading').addClass('hide');
    }

    private static _clearSpaceDuplicate() {

        $('#autocomplete').keypress(function() {
            let str:any = $(this).val();
            str = str.replace(/\s{2,}/g, ' ');
            $(this).val( str );

        });

    }

    private static _loadClickTurnOn(){
        $(document).on('click', 'body', function(){
            $(this).on('click', '.turn-on', function() {
                window.location.href;
            });
        });
    }

    private static _viewPhone() {
        const view = new PhoneNumberView();
        view.viewPhone('.jq_view_number_phone');
    }

    private static _ads() {
        const ads = new AdsView();
        ads.ads();
    }

    static init() {

        SearchController._loadResponse();
        SearchController._viewPhone();
        SearchController._complete();
        SearchController._ads();
        SearchController._registerIdCity();
        SearchController._readLocalStorageCombo();
        SearchController._clearSpaceDuplicate();
        SearchController._loadClickTurnOn();

    }

}
