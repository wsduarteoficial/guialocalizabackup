import { BaseController } from './BaseController';
import { AntiSpamHelper } from './../helpers/AntiSpamHelper';
import { ContactCompanyService } from './../services/ContactCompanyService';
import {AdsView} from '../views/AdsView';
import {PhoneNumberView} from '../views/PhoneNumberView';

export class CompanyPageController extends BaseController {

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

    private static _ads() {
        const ads = new AdsView();
        ads.ads();
    }

    private static _antiSpamRandom() {
        let random: any = Math.random();        
        return ( document.querySelector('[data-js="anti-spam"]') as HTMLInputElement).value = random;
    }

    private static _formContact() {
        $('form[name="contact-company"]').on('submit', function(e) {
            e.preventDefault();

            let csrf_token = $('meta[name=csrf-token]').attr("content");
            let token = $('input[name=_token]').val();
            let code_form = $('[data-js="anti-spam"]').val();
            let code_LS = localStorage.getItem('code-anti-spam');
            
            if(code_LS !== code_form) {
                return;
            }

            if(token === csrf_token) {
                ContactCompanyService.sendMail( $( this ).serialize() );
            }

            return false;

        });

    }

    static init() {

        CompanyPageController._loadResponse();
        CompanyPageController._complete();
        CompanyPageController._ads();
        CompanyPageController._registerIdCity();
        CompanyPageController._readLocalStorageCombo();
        CompanyPageController._clearSpaceDuplicate();
        CompanyPageController._loadClickTurnOn();
        CompanyPageController._formContact();
        AntiSpamHelper.antiSpam();

    }

}
