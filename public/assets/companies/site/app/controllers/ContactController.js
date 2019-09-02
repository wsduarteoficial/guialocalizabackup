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
define(["require", "exports", "./../helpers/AntiSpamHelper", "./../services/ContactService", "./BaseController"], function (require, exports, AntiSpamHelper_1, ContactService_1, BaseController_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var ContactController = /** @class */ (function (_super) {
        __extends(ContactController, _super);
        function ContactController() {
            return _super !== null && _super.apply(this, arguments) || this;
        }
        ContactController._complete = function () {
            return _super.complete.call(this);
        };
        ContactController._registerIdCity = function () {
            return _super.registerIdCity.call(this);
        };
        ContactController._readLocalStorageCombo = function () {
            return _super.readLocalStorageCombo.call(this);
        };
        ContactController._antiSpamRandom = function () {
            var random = Math.random();
            return document.querySelector('[data-js="anti-spam"]').value = random;
        };
        ContactController._formContact = function () {
            $('form[name="contact"]').on('submit', function (e) {
                e.preventDefault();
                var csrf_token = $('meta[name=csrf-token]').attr("content");
                var token = $('input[name=_token]').val();
                var code_form = $('[data-js="anti-spam"]').val();
                var code_LS = localStorage.getItem('code-anti-spam');
                if (code_LS !== code_form) {
                    return;
                }
                if (token === csrf_token) {
                    ContactService_1.ContactService.sendMail($(this).serialize());
                }
                return false;
            });
        };
        ContactController.init = function () {
            ContactController._complete();
            ContactController._registerIdCity();
            ContactController._readLocalStorageCombo();
            ContactController._formContact();
            AntiSpamHelper_1.AntiSpamHelper.antiSpam();
        };
        return ContactController;
    }(BaseController_1.BaseController));
    exports.ContactController = ContactController;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQ29udGFjdENvbnRyb2xsZXIuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L2NvbnRyb2xsZXJzL0NvbnRhY3RDb250cm9sbGVyLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7SUFJQTtRQUF1QyxxQ0FBYztRQUFyRDs7UUFvREEsQ0FBQztRQWxEa0IsMkJBQVMsR0FBeEI7WUFDSSxNQUFNLENBQUMsT0FBTSxRQUFRLFdBQUUsQ0FBQztRQUM1QixDQUFDO1FBRVcsaUNBQWUsR0FBOUI7WUFDTyxNQUFNLENBQUMsT0FBTSxjQUFjLFdBQUUsQ0FBQztRQUNsQyxDQUFDO1FBRVcsd0NBQXNCLEdBQXJDO1lBQ08sTUFBTSxDQUFDLE9BQU0scUJBQXFCLFdBQUUsQ0FBQztRQUN6QyxDQUFDO1FBRWMsaUNBQWUsR0FBOUI7WUFDSSxJQUFJLE1BQU0sR0FBUSxJQUFJLENBQUMsTUFBTSxFQUFFLENBQUM7WUFDaEMsTUFBTSxDQUFHLFFBQVEsQ0FBQyxhQUFhLENBQUMsdUJBQXVCLENBQXNCLENBQUMsS0FBSyxHQUFHLE1BQU0sQ0FBQztRQUNqRyxDQUFDO1FBRWMsOEJBQVksR0FBM0I7WUFDSSxDQUFDLENBQUMsc0JBQXNCLENBQUMsQ0FBQyxFQUFFLENBQUMsUUFBUSxFQUFFLFVBQVMsQ0FBQztnQkFDN0MsQ0FBQyxDQUFDLGNBQWMsRUFBRSxDQUFDO2dCQUVuQixJQUFJLFVBQVUsR0FBRyxDQUFDLENBQUMsdUJBQXVCLENBQUMsQ0FBQyxJQUFJLENBQUMsU0FBUyxDQUFDLENBQUM7Z0JBQzVELElBQUksS0FBSyxHQUFHLENBQUMsQ0FBQyxvQkFBb0IsQ0FBQyxDQUFDLEdBQUcsRUFBRSxDQUFDO2dCQUMxQyxJQUFJLFNBQVMsR0FBRyxDQUFDLENBQUMsdUJBQXVCLENBQUMsQ0FBQyxHQUFHLEVBQUUsQ0FBQztnQkFDakQsSUFBSSxPQUFPLEdBQUcsWUFBWSxDQUFDLE9BQU8sQ0FBQyxnQkFBZ0IsQ0FBQyxDQUFDO2dCQUVyRCxFQUFFLENBQUEsQ0FBQyxPQUFPLEtBQUssU0FBUyxDQUFDLENBQUMsQ0FBQztvQkFDdkIsTUFBTSxDQUFDO2dCQUNYLENBQUM7Z0JBRUQsRUFBRSxDQUFBLENBQUMsS0FBSyxLQUFLLFVBQVUsQ0FBQyxDQUFDLENBQUM7b0JBQ3RCLCtCQUFjLENBQUMsUUFBUSxDQUFFLENBQUMsQ0FBRSxJQUFJLENBQUUsQ0FBQyxTQUFTLEVBQUUsQ0FBRSxDQUFDO2dCQUNyRCxDQUFDO2dCQUVELE1BQU0sQ0FBQyxLQUFLLENBQUM7WUFFakIsQ0FBQyxDQUFDLENBQUM7UUFFUCxDQUFDO1FBRU0sc0JBQUksR0FBWDtZQUVJLGlCQUFpQixDQUFDLFNBQVMsRUFBRSxDQUFDO1lBQzlCLGlCQUFpQixDQUFDLGVBQWUsRUFBRSxDQUFDO1lBQ3BDLGlCQUFpQixDQUFDLHNCQUFzQixFQUFFLENBQUM7WUFDM0MsaUJBQWlCLENBQUMsWUFBWSxFQUFFLENBQUM7WUFDakMsK0JBQWMsQ0FBQyxRQUFRLEVBQUUsQ0FBQztRQUVqQyxDQUFDO1FBRUYsd0JBQUM7SUFBRCxDQUFDLEFBcERELENBQXVDLCtCQUFjLEdBb0RwRDtJQXBEWSw4Q0FBaUIiLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyBBbnRpU3BhbUhlbHBlciB9IGZyb20gJy4vLi4vaGVscGVycy9BbnRpU3BhbUhlbHBlcic7XG5pbXBvcnQgeyBDb250YWN0U2VydmljZSB9IGZyb20gJy4vLi4vc2VydmljZXMvQ29udGFjdFNlcnZpY2UnO1xuaW1wb3J0IHsgQmFzZUNvbnRyb2xsZXIgfSBmcm9tICcuL0Jhc2VDb250cm9sbGVyJztcblxuZXhwb3J0IGNsYXNzIENvbnRhY3RDb250cm9sbGVyIGV4dGVuZHMgQmFzZUNvbnRyb2xsZXIge1xuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX2NvbXBsZXRlKCkge1xuICAgICAgICByZXR1cm4gc3VwZXIuY29tcGxldGUoKTtcbiAgICB9XG5cblx0cHJpdmF0ZSBzdGF0aWMgX3JlZ2lzdGVySWRDaXR5KCkge1xuICAgICAgICByZXR1cm4gc3VwZXIucmVnaXN0ZXJJZENpdHkoKTtcbiAgICB9XG5cblx0cHJpdmF0ZSBzdGF0aWMgX3JlYWRMb2NhbFN0b3JhZ2VDb21ibygpIHtcbiAgICAgICAgcmV0dXJuIHN1cGVyLnJlYWRMb2NhbFN0b3JhZ2VDb21ibygpO1xuICAgIH1cblxuICAgIHByaXZhdGUgc3RhdGljIF9hbnRpU3BhbVJhbmRvbSgpIHtcbiAgICAgICAgbGV0IHJhbmRvbTogYW55ID0gTWF0aC5yYW5kb20oKTsgICAgICAgIFxuICAgICAgICByZXR1cm4gKCBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdbZGF0YS1qcz1cImFudGktc3BhbVwiXScpIGFzIEhUTUxJbnB1dEVsZW1lbnQpLnZhbHVlID0gcmFuZG9tO1xuICAgIH1cblxuICAgIHByaXZhdGUgc3RhdGljIF9mb3JtQ29udGFjdCgpIHtcbiAgICAgICAgJCgnZm9ybVtuYW1lPVwiY29udGFjdFwiXScpLm9uKCdzdWJtaXQnLCBmdW5jdGlvbihlKSB7XG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cbiAgICAgICAgICAgIGxldCBjc3JmX3Rva2VuID0gJCgnbWV0YVtuYW1lPWNzcmYtdG9rZW5dJykuYXR0cihcImNvbnRlbnRcIik7XG4gICAgICAgICAgICBsZXQgdG9rZW4gPSAkKCdpbnB1dFtuYW1lPV90b2tlbl0nKS52YWwoKTtcbiAgICAgICAgICAgIGxldCBjb2RlX2Zvcm0gPSAkKCdbZGF0YS1qcz1cImFudGktc3BhbVwiXScpLnZhbCgpO1xuICAgICAgICAgICAgbGV0IGNvZGVfTFMgPSBsb2NhbFN0b3JhZ2UuZ2V0SXRlbSgnY29kZS1hbnRpLXNwYW0nKTtcbiAgICAgICAgICAgIFxuICAgICAgICAgICAgaWYoY29kZV9MUyAhPT0gY29kZV9mb3JtKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBpZih0b2tlbiA9PT0gY3NyZl90b2tlbikge1xuICAgICAgICAgICAgICAgIENvbnRhY3RTZXJ2aWNlLnNlbmRNYWlsKCAkKCB0aGlzICkuc2VyaWFsaXplKCkgKTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgcmV0dXJuIGZhbHNlO1xuXG4gICAgICAgIH0pO1xuXG4gICAgfVxuXG4gICAgc3RhdGljIGluaXQoKSB7XG5cbiAgICAgICAgQ29udGFjdENvbnRyb2xsZXIuX2NvbXBsZXRlKCk7XG4gICAgICAgIENvbnRhY3RDb250cm9sbGVyLl9yZWdpc3RlcklkQ2l0eSgpO1xuICAgICAgICBDb250YWN0Q29udHJvbGxlci5fcmVhZExvY2FsU3RvcmFnZUNvbWJvKCk7XG4gICAgICAgIENvbnRhY3RDb250cm9sbGVyLl9mb3JtQ29udGFjdCgpO1xuICAgICAgICBBbnRpU3BhbUhlbHBlci5hbnRpU3BhbSgpO1xuXG5cdH1cblxufVxuIl19