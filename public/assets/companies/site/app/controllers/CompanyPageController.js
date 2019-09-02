var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
define(["require", "exports", "./BaseController", "./../helpers/AntiSpamHelper", "./../services/ContactCompanyService", "../views/AdsView"], function (require, exports, BaseController_1, AntiSpamHelper_1, ContactCompanyService_1, AdsView_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var CompanyPageController = /** @class */ (function (_super) {
        __extends(CompanyPageController, _super);
        function CompanyPageController() {
            return _super !== null && _super.apply(this, arguments) || this;
        }
        CompanyPageController._complete = function () {
            return _super.complete.call(this);
        };
        CompanyPageController._registerIdCity = function () {
            return _super.registerIdCity.call(this);
        };
        CompanyPageController._readLocalStorageCombo = function () {
            return _super.readLocalStorageCombo.call(this);
        };
        CompanyPageController._loadResponse = function () {
            $("section [data-load='true']").fadeIn(500);
            $('#loading').addClass('hide');
        };
        CompanyPageController._clearSpaceDuplicate = function () {
            $('#autocomplete').keypress(function () {
                var str = $(this).val();
                str = str.replace(/\s{2,}/g, ' ');
                $(this).val(str);
            });
        };
        CompanyPageController._loadClickTurnOn = function () {
            $(document).on('click', 'body', function () {
                $(this).on('click', '.turn-on', function () {
                    window.location.href;
                });
            });
        };
        CompanyPageController._ads = function () {
            var ads = new AdsView_1.AdsView();
            ads.ads();
        };
        CompanyPageController._antiSpamRandom = function () {
            var random = Math.random();
            return document.querySelector('[data-js="anti-spam"]').value = random;
        };
        CompanyPageController._formContact = function () {
            $('form[name="contact-company"]').on('submit', function (e) {
                e.preventDefault();
                var csrf_token = $('meta[name=csrf-token]').attr("content");
                var token = $('input[name=_token]').val();
                var code_form = $('[data-js="anti-spam"]').val();
                var code_LS = localStorage.getItem('code-anti-spam');
                if (code_LS !== code_form) {
                    return;
                }
                if (token === csrf_token) {
                    ContactCompanyService_1.ContactCompanyService.sendMail($(this).serialize());
                }
                return false;
            });
        };
        CompanyPageController.init = function () {
            CompanyPageController._loadResponse();
            CompanyPageController._complete();
            CompanyPageController._ads();
            CompanyPageController._registerIdCity();
            CompanyPageController._readLocalStorageCombo();
            CompanyPageController._clearSpaceDuplicate();
            CompanyPageController._loadClickTurnOn();
            CompanyPageController._formContact();
            AntiSpamHelper_1.AntiSpamHelper.antiSpam();
        };
        return CompanyPageController;
    }(BaseController_1.BaseController));
    exports.CompanyPageController = CompanyPageController;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQ29tcGFueVBhZ2VDb250cm9sbGVyLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiLi4vLi4vLi4vLi4vLi4vLi4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9zcmMvY29tcGFuaWVzL3NpdGUvdHlwZXNjcmlwdC9jb250cm9sbGVycy9Db21wYW55UGFnZUNvbnRyb2xsZXIudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7OztJQU1BO1FBQTJDLHlDQUFjO1FBQXpEOztRQXFGQSxDQUFDO1FBbkZrQiwrQkFBUyxHQUF4QjtZQUNJLE1BQU0sQ0FBQyxPQUFNLFFBQVEsV0FBRSxDQUFDO1FBQzVCLENBQUM7UUFFVyxxQ0FBZSxHQUE5QjtZQUNPLE1BQU0sQ0FBQyxPQUFNLGNBQWMsV0FBRSxDQUFDO1FBQ2xDLENBQUM7UUFFVyw0Q0FBc0IsR0FBckM7WUFDTyxNQUFNLENBQUMsT0FBTSxxQkFBcUIsV0FBRSxDQUFDO1FBQ3pDLENBQUM7UUFFYyxtQ0FBYSxHQUE1QjtZQUNJLENBQUMsQ0FBQyw0QkFBNEIsQ0FBQyxDQUFDLE1BQU0sQ0FBQyxHQUFHLENBQUMsQ0FBQztZQUM1QyxDQUFDLENBQUMsVUFBVSxDQUFDLENBQUMsUUFBUSxDQUFDLE1BQU0sQ0FBQyxDQUFDO1FBQ25DLENBQUM7UUFFYywwQ0FBb0IsR0FBbkM7WUFFSSxDQUFDLENBQUMsZUFBZSxDQUFDLENBQUMsUUFBUSxDQUFDO2dCQUN4QixJQUFJLEdBQUcsR0FBTyxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUMsR0FBRyxFQUFFLENBQUM7Z0JBQzVCLEdBQUcsR0FBRyxHQUFHLENBQUMsT0FBTyxDQUFDLFNBQVMsRUFBRSxHQUFHLENBQUMsQ0FBQztnQkFDbEMsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDLEdBQUcsQ0FBRSxHQUFHLENBQUUsQ0FBQztZQUV2QixDQUFDLENBQUMsQ0FBQztRQUVQLENBQUM7UUFFYyxzQ0FBZ0IsR0FBL0I7WUFDSSxDQUFDLENBQUMsUUFBUSxDQUFDLENBQUMsRUFBRSxDQUFDLE9BQU8sRUFBRSxNQUFNLEVBQUU7Z0JBQzVCLENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQyxFQUFFLENBQUMsT0FBTyxFQUFFLFVBQVUsRUFBRTtvQkFDNUIsTUFBTSxDQUFDLFFBQVEsQ0FBQyxJQUFJLENBQUM7Z0JBQ3pCLENBQUMsQ0FBQyxDQUFDO1lBQ1AsQ0FBQyxDQUFDLENBQUM7UUFDUCxDQUFDO1FBRWMsMEJBQUksR0FBbkI7WUFDSSxJQUFNLEdBQUcsR0FBRyxJQUFJLGlCQUFPLEVBQUUsQ0FBQztZQUMxQixHQUFHLENBQUMsR0FBRyxFQUFFLENBQUM7UUFDZCxDQUFDO1FBRWMscUNBQWUsR0FBOUI7WUFDSSxJQUFJLE1BQU0sR0FBUSxJQUFJLENBQUMsTUFBTSxFQUFFLENBQUM7WUFDaEMsTUFBTSxDQUFHLFFBQVEsQ0FBQyxhQUFhLENBQUMsdUJBQXVCLENBQXNCLENBQUMsS0FBSyxHQUFHLE1BQU0sQ0FBQztRQUNqRyxDQUFDO1FBRWMsa0NBQVksR0FBM0I7WUFDSSxDQUFDLENBQUMsOEJBQThCLENBQUMsQ0FBQyxFQUFFLENBQUMsUUFBUSxFQUFFLFVBQVMsQ0FBQztnQkFDckQsQ0FBQyxDQUFDLGNBQWMsRUFBRSxDQUFDO2dCQUVuQixJQUFJLFVBQVUsR0FBRyxDQUFDLENBQUMsdUJBQXVCLENBQUMsQ0FBQyxJQUFJLENBQUMsU0FBUyxDQUFDLENBQUM7Z0JBQzVELElBQUksS0FBSyxHQUFHLENBQUMsQ0FBQyxvQkFBb0IsQ0FBQyxDQUFDLEdBQUcsRUFBRSxDQUFDO2dCQUMxQyxJQUFJLFNBQVMsR0FBRyxDQUFDLENBQUMsdUJBQXVCLENBQUMsQ0FBQyxHQUFHLEVBQUUsQ0FBQztnQkFDakQsSUFBSSxPQUFPLEdBQUcsWUFBWSxDQUFDLE9BQU8sQ0FBQyxnQkFBZ0IsQ0FBQyxDQUFDO2dCQUVyRCxFQUFFLENBQUEsQ0FBQyxPQUFPLEtBQUssU0FBUyxDQUFDLENBQUMsQ0FBQztvQkFDdkIsTUFBTSxDQUFDO2dCQUNYLENBQUM7Z0JBRUQsRUFBRSxDQUFBLENBQUMsS0FBSyxLQUFLLFVBQVUsQ0FBQyxDQUFDLENBQUM7b0JBQ3RCLDZDQUFxQixDQUFDLFFBQVEsQ0FBRSxDQUFDLENBQUUsSUFBSSxDQUFFLENBQUMsU0FBUyxFQUFFLENBQUUsQ0FBQztnQkFDNUQsQ0FBQztnQkFFRCxNQUFNLENBQUMsS0FBSyxDQUFDO1lBRWpCLENBQUMsQ0FBQyxDQUFDO1FBRVAsQ0FBQztRQUVNLDBCQUFJLEdBQVg7WUFFSSxxQkFBcUIsQ0FBQyxhQUFhLEVBQUUsQ0FBQztZQUN0QyxxQkFBcUIsQ0FBQyxTQUFTLEVBQUUsQ0FBQztZQUNsQyxxQkFBcUIsQ0FBQyxJQUFJLEVBQUUsQ0FBQztZQUM3QixxQkFBcUIsQ0FBQyxlQUFlLEVBQUUsQ0FBQztZQUN4QyxxQkFBcUIsQ0FBQyxzQkFBc0IsRUFBRSxDQUFDO1lBQy9DLHFCQUFxQixDQUFDLG9CQUFvQixFQUFFLENBQUM7WUFDN0MscUJBQXFCLENBQUMsZ0JBQWdCLEVBQUUsQ0FBQztZQUN6QyxxQkFBcUIsQ0FBQyxZQUFZLEVBQUUsQ0FBQztZQUNyQywrQkFBYyxDQUFDLFFBQVEsRUFBRSxDQUFDO1FBRTlCLENBQUM7UUFFTCw0QkFBQztJQUFELENBQUMsQUFyRkQsQ0FBMkMsK0JBQWMsR0FxRnhEO0lBckZZLHNEQUFxQiIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7IEJhc2VDb250cm9sbGVyIH0gZnJvbSAnLi9CYXNlQ29udHJvbGxlcic7XG5pbXBvcnQgeyBBbnRpU3BhbUhlbHBlciB9IGZyb20gJy4vLi4vaGVscGVycy9BbnRpU3BhbUhlbHBlcic7XG5pbXBvcnQgeyBDb250YWN0Q29tcGFueVNlcnZpY2UgfSBmcm9tICcuLy4uL3NlcnZpY2VzL0NvbnRhY3RDb21wYW55U2VydmljZSc7XG5pbXBvcnQge0Fkc1ZpZXd9IGZyb20gJy4uL3ZpZXdzL0Fkc1ZpZXcnO1xuaW1wb3J0IHtQaG9uZU51bWJlclZpZXd9IGZyb20gJy4uL3ZpZXdzL1Bob25lTnVtYmVyVmlldyc7XG5cbmV4cG9ydCBjbGFzcyBDb21wYW55UGFnZUNvbnRyb2xsZXIgZXh0ZW5kcyBCYXNlQ29udHJvbGxlciB7XG5cbiAgICBwcml2YXRlIHN0YXRpYyBfY29tcGxldGUoKSB7XG4gICAgICAgIHJldHVybiBzdXBlci5jb21wbGV0ZSgpO1xuICAgIH1cblxuXHRwcml2YXRlIHN0YXRpYyBfcmVnaXN0ZXJJZENpdHkoKSB7XG4gICAgICAgIHJldHVybiBzdXBlci5yZWdpc3RlcklkQ2l0eSgpO1xuICAgIH1cblxuXHRwcml2YXRlIHN0YXRpYyBfcmVhZExvY2FsU3RvcmFnZUNvbWJvKCkge1xuICAgICAgICByZXR1cm4gc3VwZXIucmVhZExvY2FsU3RvcmFnZUNvbWJvKCk7XG4gICAgfVxuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX2xvYWRSZXNwb25zZSgpIHtcbiAgICAgICAgJChcInNlY3Rpb24gW2RhdGEtbG9hZD0ndHJ1ZSddXCIpLmZhZGVJbig1MDApO1xuICAgICAgICAkKCcjbG9hZGluZycpLmFkZENsYXNzKCdoaWRlJyk7XG4gICAgfVxuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX2NsZWFyU3BhY2VEdXBsaWNhdGUoKSB7XG5cbiAgICAgICAgJCgnI2F1dG9jb21wbGV0ZScpLmtleXByZXNzKGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgbGV0IHN0cjphbnkgPSAkKHRoaXMpLnZhbCgpO1xuICAgICAgICAgICAgc3RyID0gc3RyLnJlcGxhY2UoL1xcc3syLH0vZywgJyAnKTtcbiAgICAgICAgICAgICQodGhpcykudmFsKCBzdHIgKTtcblxuICAgICAgICB9KTtcblxuICAgIH1cblxuICAgIHByaXZhdGUgc3RhdGljIF9sb2FkQ2xpY2tUdXJuT24oKXtcbiAgICAgICAgJChkb2N1bWVudCkub24oJ2NsaWNrJywgJ2JvZHknLCBmdW5jdGlvbigpe1xuICAgICAgICAgICAgJCh0aGlzKS5vbignY2xpY2snLCAnLnR1cm4tb24nLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICB3aW5kb3cubG9jYXRpb24uaHJlZjtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBwcml2YXRlIHN0YXRpYyBfYWRzKCkge1xuICAgICAgICBjb25zdCBhZHMgPSBuZXcgQWRzVmlldygpO1xuICAgICAgICBhZHMuYWRzKCk7XG4gICAgfVxuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX2FudGlTcGFtUmFuZG9tKCkge1xuICAgICAgICBsZXQgcmFuZG9tOiBhbnkgPSBNYXRoLnJhbmRvbSgpOyAgICAgICAgXG4gICAgICAgIHJldHVybiAoIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWpzPVwiYW50aS1zcGFtXCJdJykgYXMgSFRNTElucHV0RWxlbWVudCkudmFsdWUgPSByYW5kb207XG4gICAgfVxuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX2Zvcm1Db250YWN0KCkge1xuICAgICAgICAkKCdmb3JtW25hbWU9XCJjb250YWN0LWNvbXBhbnlcIl0nKS5vbignc3VibWl0JywgZnVuY3Rpb24oZSkge1xuICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG4gICAgICAgICAgICBsZXQgY3NyZl90b2tlbiA9ICQoJ21ldGFbbmFtZT1jc3JmLXRva2VuXScpLmF0dHIoXCJjb250ZW50XCIpO1xuICAgICAgICAgICAgbGV0IHRva2VuID0gJCgnaW5wdXRbbmFtZT1fdG9rZW5dJykudmFsKCk7XG4gICAgICAgICAgICBsZXQgY29kZV9mb3JtID0gJCgnW2RhdGEtanM9XCJhbnRpLXNwYW1cIl0nKS52YWwoKTtcbiAgICAgICAgICAgIGxldCBjb2RlX0xTID0gbG9jYWxTdG9yYWdlLmdldEl0ZW0oJ2NvZGUtYW50aS1zcGFtJyk7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgIGlmKGNvZGVfTFMgIT09IGNvZGVfZm9ybSkge1xuICAgICAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgaWYodG9rZW4gPT09IGNzcmZfdG9rZW4pIHtcbiAgICAgICAgICAgICAgICBDb250YWN0Q29tcGFueVNlcnZpY2Uuc2VuZE1haWwoICQoIHRoaXMgKS5zZXJpYWxpemUoKSApO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG5cbiAgICAgICAgfSk7XG5cbiAgICB9XG5cbiAgICBzdGF0aWMgaW5pdCgpIHtcblxuICAgICAgICBDb21wYW55UGFnZUNvbnRyb2xsZXIuX2xvYWRSZXNwb25zZSgpO1xuICAgICAgICBDb21wYW55UGFnZUNvbnRyb2xsZXIuX2NvbXBsZXRlKCk7XG4gICAgICAgIENvbXBhbnlQYWdlQ29udHJvbGxlci5fYWRzKCk7XG4gICAgICAgIENvbXBhbnlQYWdlQ29udHJvbGxlci5fcmVnaXN0ZXJJZENpdHkoKTtcbiAgICAgICAgQ29tcGFueVBhZ2VDb250cm9sbGVyLl9yZWFkTG9jYWxTdG9yYWdlQ29tYm8oKTtcbiAgICAgICAgQ29tcGFueVBhZ2VDb250cm9sbGVyLl9jbGVhclNwYWNlRHVwbGljYXRlKCk7XG4gICAgICAgIENvbXBhbnlQYWdlQ29udHJvbGxlci5fbG9hZENsaWNrVHVybk9uKCk7XG4gICAgICAgIENvbXBhbnlQYWdlQ29udHJvbGxlci5fZm9ybUNvbnRhY3QoKTtcbiAgICAgICAgQW50aVNwYW1IZWxwZXIuYW50aVNwYW0oKTtcblxuICAgIH1cblxufVxuIl19