import { AutoCompleteService } from "../services/AutoCompleteService";
import { ReadLocalStorageService } from "../services/ReadLocalStorageService";
import { RegisterDataCityService } from "../services/RegisterDataCityService";

export class BaseController {

    protected static complete() {
        const complete = new AutoCompleteService();
        complete.autoComplete('#autocomplete');
    }

	protected static registerIdCity() {
        const service = new RegisterDataCityService();
        service.register('#phone_city');
    }

	protected static readLocalStorageCombo() {
        ReadLocalStorageService.comboCity();
    }
}
