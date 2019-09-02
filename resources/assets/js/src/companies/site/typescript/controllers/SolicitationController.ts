import { AntiSpamHelper } from './../helpers/AntiSpamHelper';
import { SolicitationService } from './../services/SolicitationService';
import { BaseController } from './BaseController';

export class SolicitationController extends BaseController {

    private static _complete() {
        return super.complete();
    }

	private static _registerIdCity() {
        return super.registerIdCity();
    }

	private static _readLocalStorageCombo() {
        return super.readLocalStorageCombo();
    }

    private static _formSoliticitation() {
        $('form[name="solicitation"]').on('submit', function(e) {
            e.preventDefault();

            let csrf_token = $('meta[name=csrf-token]').attr("content");
            let token = $('input[name=_token]').val();
            let code_form = $('[data-js="anti-spam"]').val();
            let code_LS = localStorage.getItem('code-anti-spam');
            
            if(code_LS !== code_form) {
                return;
            }

            if(token === csrf_token) {
                SolicitationService.sendMail($( this ).serialize());
            }

            return false;

        });

    }

    static init() { 
        SolicitationController._complete();
        SolicitationController._registerIdCity();
        SolicitationController._readLocalStorageCombo();
        SolicitationController._formSoliticitation();
        AntiSpamHelper.antiSpam();        
	}

}
