define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var ReadLocalStorageService = /** @class */ (function () {
        function ReadLocalStorageService() {
        }
        ReadLocalStorageService._changeActionForm = function (serviceSearch) {
            if (serviceSearch === 'phone') {
                $("#form-search-phone").attr("action", "/empresa/busca/");
            }
            else if (serviceSearch === 'classified') {
                $("#form-search-phone").attr("action", "/classificado/busca/");
            }
            $('select[name="service"]').find("option[value=\"" + serviceSearch + "\"]").attr("selected", "selected");
        };
        ReadLocalStorageService.comboCity = function () {
            var serviceSearch;
            var phoneStateId;
            var phoneCityId;
            serviceSearch = localStorage.getItem('serviceSearch');
            phoneStateId = localStorage.getItem('phoneStateId');
            phoneCityId = localStorage.getItem('phoneCityId');
            if (serviceSearch) {
                ReadLocalStorageService._changeActionForm(serviceSearch);
            }
            // Change option
            if (phoneStateId > 0 && phoneStateId > 0) {
                $('input[name="state"]').val(phoneStateId);
                $('select[name="city"]')
                    .find("option[value=\"" + phoneCityId + "\"]")
                    .attr("selected", "selected");
            }
        };
        return ReadLocalStorageService;
    }());
    exports.ReadLocalStorageService = ReadLocalStorageService;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiUmVhZExvY2FsU3RvcmFnZVNlcnZpY2UuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L3NlcnZpY2VzL1JlYWRMb2NhbFN0b3JhZ2VTZXJ2aWNlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7OztJQUFBO1FBQUE7UUFzQ0EsQ0FBQztRQXBDa0IseUNBQWlCLEdBQWhDLFVBQWlDLGFBQXFCO1lBRWxELEVBQUUsQ0FBQyxDQUFDLGFBQWEsS0FBSyxPQUFPLENBQUMsQ0FBQyxDQUFDO2dCQUM1QixDQUFDLENBQUMsb0JBQW9CLENBQUMsQ0FBQyxJQUFJLENBQUMsUUFBUSxFQUFFLGlCQUFpQixDQUFDLENBQUM7WUFDOUQsQ0FBQztZQUFDLElBQUksQ0FBQyxFQUFFLENBQUMsQ0FBQyxhQUFhLEtBQUssWUFBWSxDQUFDLENBQUMsQ0FBQztnQkFDeEMsQ0FBQyxDQUFDLG9CQUFvQixDQUFDLENBQUMsSUFBSSxDQUFDLFFBQVEsRUFBRSxzQkFBc0IsQ0FBQyxDQUFDO1lBQ25FLENBQUM7WUFFRCxDQUFDLENBQUMsd0JBQXdCLENBQUMsQ0FBQyxJQUFJLENBQUMsb0JBQWlCLGFBQWEsUUFBSSxDQUFDLENBQUMsSUFBSSxDQUFDLFVBQVUsRUFBRSxVQUFVLENBQUMsQ0FBQztRQUV0RyxDQUFDO1FBRWEsaUNBQVMsR0FBdkI7WUFFSSxJQUFJLGFBQWtCLENBQUM7WUFDdkIsSUFBSSxZQUFpQixDQUFDO1lBQ3RCLElBQUksV0FBZ0IsQ0FBQztZQUVyQixhQUFhLEdBQUcsWUFBWSxDQUFDLE9BQU8sQ0FBQyxlQUFlLENBQUMsQ0FBQztZQUN0RCxZQUFZLEdBQUcsWUFBWSxDQUFDLE9BQU8sQ0FBQyxjQUFjLENBQUMsQ0FBQztZQUNwRCxXQUFXLEdBQUcsWUFBWSxDQUFDLE9BQU8sQ0FBQyxhQUFhLENBQUMsQ0FBQztZQUVsRCxFQUFFLENBQUMsQ0FBQyxhQUFhLENBQUMsQ0FBQyxDQUFDO2dCQUNoQix1QkFBdUIsQ0FBQyxpQkFBaUIsQ0FBQyxhQUFhLENBQUMsQ0FBQztZQUM3RCxDQUFDO1lBRUQsZ0JBQWdCO1lBQ2hCLEVBQUUsQ0FBQyxDQUFDLFlBQVksR0FBRyxDQUFDLElBQUksWUFBWSxHQUFHLENBQUMsQ0FBQyxDQUFDLENBQUM7Z0JBQ3ZDLENBQUMsQ0FBQyxxQkFBcUIsQ0FBQyxDQUFDLEdBQUcsQ0FBQyxZQUFZLENBQUMsQ0FBQztnQkFDM0MsQ0FBQyxDQUFDLHFCQUFxQixDQUFDO3FCQUNuQixJQUFJLENBQUMsb0JBQWlCLFdBQVcsUUFBSSxDQUFDO3FCQUN0QyxJQUFJLENBQUMsVUFBVSxFQUFFLFVBQVUsQ0FBQyxDQUFDO1lBQ3RDLENBQUM7UUFFTCxDQUFDO1FBRUwsOEJBQUM7SUFBRCxDQUFDLEFBdENELElBc0NDO0lBdENZLDBEQUF1QiIsInNvdXJjZXNDb250ZW50IjpbImV4cG9ydCBjbGFzcyBSZWFkTG9jYWxTdG9yYWdlU2VydmljZSB7XG5cbiAgICBwcml2YXRlIHN0YXRpYyBfY2hhbmdlQWN0aW9uRm9ybShzZXJ2aWNlU2VhcmNoOiBzdHJpbmcpIHtcbiAgICAgICAgXG4gICAgICAgIGlmIChzZXJ2aWNlU2VhcmNoID09PSAncGhvbmUnKSB7XG4gICAgICAgICAgICAkKFwiI2Zvcm0tc2VhcmNoLXBob25lXCIpLmF0dHIoXCJhY3Rpb25cIiwgXCIvZW1wcmVzYS9idXNjYS9cIik7XG4gICAgICAgIH0gZWxzZSBpZiAoc2VydmljZVNlYXJjaCA9PT0gJ2NsYXNzaWZpZWQnKSB7XG4gICAgICAgICAgICAkKFwiI2Zvcm0tc2VhcmNoLXBob25lXCIpLmF0dHIoXCJhY3Rpb25cIiwgXCIvY2xhc3NpZmljYWRvL2J1c2NhL1wiKTtcbiAgICAgICAgfVxuXG4gICAgICAgICQoJ3NlbGVjdFtuYW1lPVwic2VydmljZVwiXScpLmZpbmQoYG9wdGlvblt2YWx1ZT1cIiR7c2VydmljZVNlYXJjaH1cIl1gKS5hdHRyKFwic2VsZWN0ZWRcIiwgXCJzZWxlY3RlZFwiKTtcblxuICAgIH1cblxuICAgIHB1YmxpYyBzdGF0aWMgY29tYm9DaXR5KCkge1xuICAgICAgICAgXG4gICAgICAgIGxldCBzZXJ2aWNlU2VhcmNoOiBhbnk7XG4gICAgICAgIGxldCBwaG9uZVN0YXRlSWQ6IGFueTtcbiAgICAgICAgbGV0IHBob25lQ2l0eUlkOiBhbnk7XG5cbiAgICAgICAgc2VydmljZVNlYXJjaCA9IGxvY2FsU3RvcmFnZS5nZXRJdGVtKCdzZXJ2aWNlU2VhcmNoJyk7XG4gICAgICAgIHBob25lU3RhdGVJZCA9IGxvY2FsU3RvcmFnZS5nZXRJdGVtKCdwaG9uZVN0YXRlSWQnKTtcbiAgICAgICAgcGhvbmVDaXR5SWQgPSBsb2NhbFN0b3JhZ2UuZ2V0SXRlbSgncGhvbmVDaXR5SWQnKTtcblxuICAgICAgICBpZiAoc2VydmljZVNlYXJjaCkge1xuICAgICAgICAgICAgUmVhZExvY2FsU3RvcmFnZVNlcnZpY2UuX2NoYW5nZUFjdGlvbkZvcm0oc2VydmljZVNlYXJjaCk7XG4gICAgICAgIH1cblxuICAgICAgICAvLyBDaGFuZ2Ugb3B0aW9uXG4gICAgICAgIGlmIChwaG9uZVN0YXRlSWQgPiAwICYmIHBob25lU3RhdGVJZCA+IDApIHtcbiAgICAgICAgICAgICQoJ2lucHV0W25hbWU9XCJzdGF0ZVwiXScpLnZhbChwaG9uZVN0YXRlSWQpO1xuICAgICAgICAgICAgJCgnc2VsZWN0W25hbWU9XCJjaXR5XCJdJylcbiAgICAgICAgICAgICAgICAuZmluZChgb3B0aW9uW3ZhbHVlPVwiJHtwaG9uZUNpdHlJZH1cIl1gKVxuICAgICAgICAgICAgICAgIC5hdHRyKFwic2VsZWN0ZWRcIiwgXCJzZWxlY3RlZFwiKTtcbiAgICAgICAgfVxuXG4gICAgfVxuXG59XG4iXX0=