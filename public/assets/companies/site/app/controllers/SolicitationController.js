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
define(["require", "exports", "./../helpers/AntiSpamHelper", "./../services/SolicitationService", "./BaseController"], function (require, exports, AntiSpamHelper_1, SolicitationService_1, BaseController_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var SolicitationController = /** @class */ (function (_super) {
        __extends(SolicitationController, _super);
        function SolicitationController() {
            return _super !== null && _super.apply(this, arguments) || this;
        }
        SolicitationController._complete = function () {
            return _super.complete.call(this);
        };
        SolicitationController._registerIdCity = function () {
            return _super.registerIdCity.call(this);
        };
        SolicitationController._readLocalStorageCombo = function () {
            return _super.readLocalStorageCombo.call(this);
        };
        SolicitationController._formSoliticitation = function () {
            $('form[name="solicitation"]').on('submit', function (e) {
                e.preventDefault();
                var csrf_token = $('meta[name=csrf-token]').attr("content");
                var token = $('input[name=_token]').val();
                var code_form = $('[data-js="anti-spam"]').val();
                var code_LS = localStorage.getItem('code-anti-spam');
                if (code_LS !== code_form) {
                    return;
                }
                if (token === csrf_token) {
                    SolicitationService_1.SolicitationService.sendMail($(this).serialize());
                }
                return false;
            });
        };
        SolicitationController.init = function () {
            SolicitationController._complete();
            SolicitationController._registerIdCity();
            SolicitationController._readLocalStorageCombo();
            SolicitationController._formSoliticitation();
            AntiSpamHelper_1.AntiSpamHelper.antiSpam();
        };
        return SolicitationController;
    }(BaseController_1.BaseController));
    exports.SolicitationController = SolicitationController;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiU29saWNpdGF0aW9uQ29udHJvbGxlci5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbIi4uLy4uLy4uLy4uLy4uLy4uL3Jlc291cmNlcy9hc3NldHMvanMvc3JjL2NvbXBhbmllcy9zaXRlL3R5cGVzY3JpcHQvY29udHJvbGxlcnMvU29saWNpdGF0aW9uQ29udHJvbGxlci50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7O0lBSUE7UUFBNEMsMENBQWM7UUFBMUQ7O1FBNkNBLENBQUM7UUEzQ2tCLGdDQUFTLEdBQXhCO1lBQ0ksTUFBTSxDQUFDLE9BQU0sUUFBUSxXQUFFLENBQUM7UUFDNUIsQ0FBQztRQUVXLHNDQUFlLEdBQTlCO1lBQ08sTUFBTSxDQUFDLE9BQU0sY0FBYyxXQUFFLENBQUM7UUFDbEMsQ0FBQztRQUVXLDZDQUFzQixHQUFyQztZQUNPLE1BQU0sQ0FBQyxPQUFNLHFCQUFxQixXQUFFLENBQUM7UUFDekMsQ0FBQztRQUVjLDBDQUFtQixHQUFsQztZQUNJLENBQUMsQ0FBQywyQkFBMkIsQ0FBQyxDQUFDLEVBQUUsQ0FBQyxRQUFRLEVBQUUsVUFBUyxDQUFDO2dCQUNsRCxDQUFDLENBQUMsY0FBYyxFQUFFLENBQUM7Z0JBRW5CLElBQUksVUFBVSxHQUFHLENBQUMsQ0FBQyx1QkFBdUIsQ0FBQyxDQUFDLElBQUksQ0FBQyxTQUFTLENBQUMsQ0FBQztnQkFDNUQsSUFBSSxLQUFLLEdBQUcsQ0FBQyxDQUFDLG9CQUFvQixDQUFDLENBQUMsR0FBRyxFQUFFLENBQUM7Z0JBQzFDLElBQUksU0FBUyxHQUFHLENBQUMsQ0FBQyx1QkFBdUIsQ0FBQyxDQUFDLEdBQUcsRUFBRSxDQUFDO2dCQUNqRCxJQUFJLE9BQU8sR0FBRyxZQUFZLENBQUMsT0FBTyxDQUFDLGdCQUFnQixDQUFDLENBQUM7Z0JBRXJELEVBQUUsQ0FBQSxDQUFDLE9BQU8sS0FBSyxTQUFTLENBQUMsQ0FBQyxDQUFDO29CQUN2QixNQUFNLENBQUM7Z0JBQ1gsQ0FBQztnQkFFRCxFQUFFLENBQUEsQ0FBQyxLQUFLLEtBQUssVUFBVSxDQUFDLENBQUMsQ0FBQztvQkFDdEIseUNBQW1CLENBQUMsUUFBUSxDQUFDLENBQUMsQ0FBRSxJQUFJLENBQUUsQ0FBQyxTQUFTLEVBQUUsQ0FBQyxDQUFDO2dCQUN4RCxDQUFDO2dCQUVELE1BQU0sQ0FBQyxLQUFLLENBQUM7WUFFakIsQ0FBQyxDQUFDLENBQUM7UUFFUCxDQUFDO1FBRU0sMkJBQUksR0FBWDtZQUNJLHNCQUFzQixDQUFDLFNBQVMsRUFBRSxDQUFDO1lBQ25DLHNCQUFzQixDQUFDLGVBQWUsRUFBRSxDQUFDO1lBQ3pDLHNCQUFzQixDQUFDLHNCQUFzQixFQUFFLENBQUM7WUFDaEQsc0JBQXNCLENBQUMsbUJBQW1CLEVBQUUsQ0FBQztZQUM3QywrQkFBYyxDQUFDLFFBQVEsRUFBRSxDQUFDO1FBQ2pDLENBQUM7UUFFRiw2QkFBQztJQUFELENBQUMsQUE3Q0QsQ0FBNEMsK0JBQWMsR0E2Q3pEO0lBN0NZLHdEQUFzQiIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7IEFudGlTcGFtSGVscGVyIH0gZnJvbSAnLi8uLi9oZWxwZXJzL0FudGlTcGFtSGVscGVyJztcbmltcG9ydCB7IFNvbGljaXRhdGlvblNlcnZpY2UgfSBmcm9tICcuLy4uL3NlcnZpY2VzL1NvbGljaXRhdGlvblNlcnZpY2UnO1xuaW1wb3J0IHsgQmFzZUNvbnRyb2xsZXIgfSBmcm9tICcuL0Jhc2VDb250cm9sbGVyJztcblxuZXhwb3J0IGNsYXNzIFNvbGljaXRhdGlvbkNvbnRyb2xsZXIgZXh0ZW5kcyBCYXNlQ29udHJvbGxlciB7XG5cbiAgICBwcml2YXRlIHN0YXRpYyBfY29tcGxldGUoKSB7XG4gICAgICAgIHJldHVybiBzdXBlci5jb21wbGV0ZSgpO1xuICAgIH1cblxuXHRwcml2YXRlIHN0YXRpYyBfcmVnaXN0ZXJJZENpdHkoKSB7XG4gICAgICAgIHJldHVybiBzdXBlci5yZWdpc3RlcklkQ2l0eSgpO1xuICAgIH1cblxuXHRwcml2YXRlIHN0YXRpYyBfcmVhZExvY2FsU3RvcmFnZUNvbWJvKCkge1xuICAgICAgICByZXR1cm4gc3VwZXIucmVhZExvY2FsU3RvcmFnZUNvbWJvKCk7XG4gICAgfVxuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX2Zvcm1Tb2xpdGljaXRhdGlvbigpIHtcbiAgICAgICAgJCgnZm9ybVtuYW1lPVwic29saWNpdGF0aW9uXCJdJykub24oJ3N1Ym1pdCcsIGZ1bmN0aW9uKGUpIHtcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcblxuICAgICAgICAgICAgbGV0IGNzcmZfdG9rZW4gPSAkKCdtZXRhW25hbWU9Y3NyZi10b2tlbl0nKS5hdHRyKFwiY29udGVudFwiKTtcbiAgICAgICAgICAgIGxldCB0b2tlbiA9ICQoJ2lucHV0W25hbWU9X3Rva2VuXScpLnZhbCgpO1xuICAgICAgICAgICAgbGV0IGNvZGVfZm9ybSA9ICQoJ1tkYXRhLWpzPVwiYW50aS1zcGFtXCJdJykudmFsKCk7XG4gICAgICAgICAgICBsZXQgY29kZV9MUyA9IGxvY2FsU3RvcmFnZS5nZXRJdGVtKCdjb2RlLWFudGktc3BhbScpO1xuICAgICAgICAgICAgXG4gICAgICAgICAgICBpZihjb2RlX0xTICE9PSBjb2RlX2Zvcm0pIHtcbiAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGlmKHRva2VuID09PSBjc3JmX3Rva2VuKSB7XG4gICAgICAgICAgICAgICAgU29saWNpdGF0aW9uU2VydmljZS5zZW5kTWFpbCgkKCB0aGlzICkuc2VyaWFsaXplKCkpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG5cbiAgICAgICAgfSk7XG5cbiAgICB9XG5cbiAgICBzdGF0aWMgaW5pdCgpIHsgXG4gICAgICAgIFNvbGljaXRhdGlvbkNvbnRyb2xsZXIuX2NvbXBsZXRlKCk7XG4gICAgICAgIFNvbGljaXRhdGlvbkNvbnRyb2xsZXIuX3JlZ2lzdGVySWRDaXR5KCk7XG4gICAgICAgIFNvbGljaXRhdGlvbkNvbnRyb2xsZXIuX3JlYWRMb2NhbFN0b3JhZ2VDb21ibygpO1xuICAgICAgICBTb2xpY2l0YXRpb25Db250cm9sbGVyLl9mb3JtU29saXRpY2l0YXRpb24oKTtcbiAgICAgICAgQW50aVNwYW1IZWxwZXIuYW50aVNwYW0oKTsgICAgICAgIFxuXHR9XG5cbn1cbiJdfQ==