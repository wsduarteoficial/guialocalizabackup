import { BaseController } from './BaseController';

export class HomeController extends BaseController {

    private static _complete() {
        return super.complete();
    }

	private static _registerIdCity() {
        return super.registerIdCity();
    }

	private static _readLocalStorageCombo() {
        return super.readLocalStorageCombo();
    }

    static init() {
        HomeController._complete();
        HomeController._registerIdCity();
        HomeController._readLocalStorageCombo();
	}

}
