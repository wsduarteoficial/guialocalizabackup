///<reference path="../../../../../../../../node_modules/@types/jquery/index.d.ts" />
///<reference path="../../../../../../../../jquery.autocomplete.d.ts" />
define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var AutoCompleteService = /** @class */ (function () {
        function AutoCompleteService() {
            this._url = '/companies/ajax/autocomplete/search';
        }
        AutoCompleteService.prototype.serviceUrl = function (url) {
            this._url = url;
        };
        AutoCompleteService.prototype.autoComplete = function (el) {
            $(el).autocomplete({
                minChars: 2,
                maxHeight: 200,
                serviceUrl: this._url,
            });
        };
        return AutoCompleteService;
    }());
    exports.AutoCompleteService = AutoCompleteService;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQXV0b0NvbXBsZXRlU2VydmljZS5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbIi4uLy4uLy4uLy4uLy4uLy4uL3Jlc291cmNlcy9hc3NldHMvanMvc3JjL2NvbXBhbmllcy9zaXRlL3R5cGVzY3JpcHQvc2VydmljZXMvQXV0b0NvbXBsZXRlU2VydmljZS50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSxxRkFBcUY7QUFDckYsd0VBQXdFOzs7O0lBRXhFO1FBQUE7WUFFWSxTQUFJLEdBQVcscUNBQXFDLENBQUM7UUFtQmpFLENBQUM7UUFqQlUsd0NBQVUsR0FBakIsVUFBa0IsR0FBVztZQUN6QixJQUFJLENBQUMsSUFBSSxHQUFHLEdBQUcsQ0FBQztRQUNwQixDQUFDO1FBRU0sMENBQVksR0FBbkIsVUFBb0IsRUFBUztZQUV6QixDQUFDLENBQUMsRUFBRSxDQUFDLENBQUMsWUFBWSxDQUFDO2dCQUNmLFFBQVEsRUFBRSxDQUFDO2dCQUNkLFNBQVMsRUFBRSxHQUFHO2dCQUNYLFVBQVUsRUFBRSxJQUFJLENBQUMsSUFBSTthQUl4QixDQUFDLENBQUM7UUFFUCxDQUFDO1FBRUwsMEJBQUM7SUFBRCxDQUFDLEFBckJELElBcUJDO0lBckJZLGtEQUFtQiIsInNvdXJjZXNDb250ZW50IjpbIi8vLzxyZWZlcmVuY2UgcGF0aD1cIi4uLy4uLy4uLy4uLy4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy9AdHlwZXMvanF1ZXJ5L2luZGV4LmQudHNcIiAvPlxuLy8vPHJlZmVyZW5jZSBwYXRoPVwiLi4vLi4vLi4vLi4vLi4vLi4vLi4vLi4vanF1ZXJ5LmF1dG9jb21wbGV0ZS5kLnRzXCIgLz5cblxuZXhwb3J0IGNsYXNzIEF1dG9Db21wbGV0ZVNlcnZpY2Uge1xuXG4gICAgcHJpdmF0ZSBfdXJsOiBzdHJpbmcgPSAnL2NvbXBhbmllcy9hamF4L2F1dG9jb21wbGV0ZS9zZWFyY2gnO1xuXG4gICAgcHVibGljIHNlcnZpY2VVcmwodXJsOiBzdHJpbmcpe1xuICAgICAgICB0aGlzLl91cmwgPSB1cmw7XG4gICAgfVxuXG4gICAgcHVibGljIGF1dG9Db21wbGV0ZShlbDpzdHJpbmcpIHtcblxuICAgICAgICAkKGVsKS5hdXRvY29tcGxldGUoe1xuICAgICAgICAgICAgbWluQ2hhcnM6IDIsXG4gICAgICAgIFx0bWF4SGVpZ2h0OiAyMDAsXG4gICAgICAgICAgICBzZXJ2aWNlVXJsOiB0aGlzLl91cmwsXG4gICAgICAgICAgICAvLyBvblNlbGVjdDogZnVuY3Rpb24gKHN1Z2dlc3Rpb24pIHtcbiAgICAgICAgICAgIC8vICAgICBhbGVydCgnWW91IHNlbGVjdGVkOiAnICsgc3VnZ2VzdGlvbi52YWx1ZSArICcsICcgKyBzdWdnZXN0aW9uLmRhdGEpO1xuICAgICAgICAgICAgLy8gfVxuICAgICAgICB9KTtcblxuICAgIH1cblxufVxuIl19