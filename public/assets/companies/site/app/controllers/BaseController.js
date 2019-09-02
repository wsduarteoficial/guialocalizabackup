define(["require", "exports", "../services/AutoCompleteService", "../services/ReadLocalStorageService", "../services/RegisterDataCityService"], function (require, exports, AutoCompleteService_1, ReadLocalStorageService_1, RegisterDataCityService_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var BaseController = /** @class */ (function () {
        function BaseController() {
        }
        BaseController.complete = function () {
            var complete = new AutoCompleteService_1.AutoCompleteService();
            complete.autoComplete('#autocomplete');
        };
        BaseController.registerIdCity = function () {
            var service = new RegisterDataCityService_1.RegisterDataCityService();
            service.register('#phone_city');
        };
        BaseController.readLocalStorageCombo = function () {
            ReadLocalStorageService_1.ReadLocalStorageService.comboCity();
        };
        return BaseController;
    }());
    exports.BaseController = BaseController;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQmFzZUNvbnRyb2xsZXIuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L2NvbnRyb2xsZXJzL0Jhc2VDb250cm9sbGVyLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7OztJQUlBO1FBQUE7UUFlQSxDQUFDO1FBYm9CLHVCQUFRLEdBQXpCO1lBQ0ksSUFBTSxRQUFRLEdBQUcsSUFBSSx5Q0FBbUIsRUFBRSxDQUFDO1lBQzNDLFFBQVEsQ0FBQyxZQUFZLENBQUMsZUFBZSxDQUFDLENBQUM7UUFDM0MsQ0FBQztRQUVhLDZCQUFjLEdBQS9CO1lBQ08sSUFBTSxPQUFPLEdBQUcsSUFBSSxpREFBdUIsRUFBRSxDQUFDO1lBQzlDLE9BQU8sQ0FBQyxRQUFRLENBQUMsYUFBYSxDQUFDLENBQUM7UUFDcEMsQ0FBQztRQUVhLG9DQUFxQixHQUF0QztZQUNPLGlEQUF1QixDQUFDLFNBQVMsRUFBRSxDQUFDO1FBQ3hDLENBQUM7UUFDTCxxQkFBQztJQUFELENBQUMsQUFmRCxJQWVDO0lBZlksd0NBQWMiLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyBBdXRvQ29tcGxldGVTZXJ2aWNlIH0gZnJvbSBcIi4uL3NlcnZpY2VzL0F1dG9Db21wbGV0ZVNlcnZpY2VcIjtcbmltcG9ydCB7IFJlYWRMb2NhbFN0b3JhZ2VTZXJ2aWNlIH0gZnJvbSBcIi4uL3NlcnZpY2VzL1JlYWRMb2NhbFN0b3JhZ2VTZXJ2aWNlXCI7XG5pbXBvcnQgeyBSZWdpc3RlckRhdGFDaXR5U2VydmljZSB9IGZyb20gXCIuLi9zZXJ2aWNlcy9SZWdpc3RlckRhdGFDaXR5U2VydmljZVwiO1xuXG5leHBvcnQgY2xhc3MgQmFzZUNvbnRyb2xsZXIge1xuXG4gICAgcHJvdGVjdGVkIHN0YXRpYyBjb21wbGV0ZSgpIHtcbiAgICAgICAgY29uc3QgY29tcGxldGUgPSBuZXcgQXV0b0NvbXBsZXRlU2VydmljZSgpO1xuICAgICAgICBjb21wbGV0ZS5hdXRvQ29tcGxldGUoJyNhdXRvY29tcGxldGUnKTtcbiAgICB9XG5cblx0cHJvdGVjdGVkIHN0YXRpYyByZWdpc3RlcklkQ2l0eSgpIHtcbiAgICAgICAgY29uc3Qgc2VydmljZSA9IG5ldyBSZWdpc3RlckRhdGFDaXR5U2VydmljZSgpO1xuICAgICAgICBzZXJ2aWNlLnJlZ2lzdGVyKCcjcGhvbmVfY2l0eScpO1xuICAgIH1cblxuXHRwcm90ZWN0ZWQgc3RhdGljIHJlYWRMb2NhbFN0b3JhZ2VDb21ibygpIHtcbiAgICAgICAgUmVhZExvY2FsU3RvcmFnZVNlcnZpY2UuY29tYm9DaXR5KCk7XG4gICAgfVxufVxuIl19