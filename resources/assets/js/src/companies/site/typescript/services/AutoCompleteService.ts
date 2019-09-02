///<reference path="../../../../../../../../node_modules/@types/jquery/index.d.ts" />
///<reference path="../../../../../../../../jquery.autocomplete.d.ts" />

export class AutoCompleteService {

    private _url: string = '/companies/ajax/autocomplete/search';

    public serviceUrl(url: string){
        this._url = url;
    }

    public autoComplete(el:string) {

        $(el).autocomplete({
            minChars: 2,
        	maxHeight: 200,
            serviceUrl: this._url,
            // onSelect: function (suggestion) {
            //     alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            // }
        });

    }

}
