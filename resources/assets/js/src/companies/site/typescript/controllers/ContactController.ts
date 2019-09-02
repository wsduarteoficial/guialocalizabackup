import { AntiSpamHelper } from './../helpers/AntiSpamHelper';
import { ContactService } from './../services/ContactService';
import { BaseController } from './BaseController';

export class ContactController extends BaseController {

    private static _complete() {
        return super.complete();
    }

	private static _registerIdCity() {
        return super.registerIdCity();
    }

	private static _readLocalStorageCombo() {
        return super.readLocalStorageCombo();
    }

    private static _antiSpamRandom() {
        let random: any = Math.random();        
        return ( document.querySelector('[data-js="anti-spam"]') as HTMLInputElement).value = random;
    }

    private static _formContact() {
        $('form[name="contact"]').on('submit', function(e) {
            e.preventDefault();

            let csrf_token = $('meta[name=csrf-token]').attr("content");
            let token = $('input[name=_token]').val();
            let code_form = $('[data-js="anti-spam"]').val();
            let code_LS = localStorage.getItem('code-anti-spam');
            
            if(code_LS !== code_form) {
                return;
            }

            if(token === csrf_token) {
                ContactService.sendMail( $( this ).serialize() );
            }

            return false;

        });

    }

    static init() {

        ContactController._complete();
        ContactController._registerIdCity();
        ContactController._readLocalStorageCombo();
        ContactController._formContact();
        AntiSpamHelper.antiSpam();

	}

}
