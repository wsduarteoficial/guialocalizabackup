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
define(["require", "exports", "./BaseController"], function (require, exports, BaseController_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var HomeController = /** @class */ (function (_super) {
        __extends(HomeController, _super);
        function HomeController() {
            return _super !== null && _super.apply(this, arguments) || this;
        }
        HomeController._complete = function () {
            return _super.complete.call(this);
        };
        HomeController._registerIdCity = function () {
            return _super.registerIdCity.call(this);
        };
        HomeController._readLocalStorageCombo = function () {
            return _super.readLocalStorageCombo.call(this);
        };
        HomeController.init = function () {
            HomeController._complete();
            HomeController._registerIdCity();
            HomeController._readLocalStorageCombo();
        };
        return HomeController;
    }(BaseController_1.BaseController));
    exports.HomeController = HomeController;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiSG9tZUNvbnRyb2xsZXIuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L2NvbnRyb2xsZXJzL0hvbWVDb250cm9sbGVyLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7SUFFQTtRQUFvQyxrQ0FBYztRQUFsRDs7UUFvQkEsQ0FBQztRQWxCa0Isd0JBQVMsR0FBeEI7WUFDSSxNQUFNLENBQUMsT0FBTSxRQUFRLFdBQUUsQ0FBQztRQUM1QixDQUFDO1FBRVcsOEJBQWUsR0FBOUI7WUFDTyxNQUFNLENBQUMsT0FBTSxjQUFjLFdBQUUsQ0FBQztRQUNsQyxDQUFDO1FBRVcscUNBQXNCLEdBQXJDO1lBQ08sTUFBTSxDQUFDLE9BQU0scUJBQXFCLFdBQUUsQ0FBQztRQUN6QyxDQUFDO1FBRU0sbUJBQUksR0FBWDtZQUNJLGNBQWMsQ0FBQyxTQUFTLEVBQUUsQ0FBQztZQUMzQixjQUFjLENBQUMsZUFBZSxFQUFFLENBQUM7WUFDakMsY0FBYyxDQUFDLHNCQUFzQixFQUFFLENBQUM7UUFDL0MsQ0FBQztRQUVGLHFCQUFDO0lBQUQsQ0FBQyxBQXBCRCxDQUFvQywrQkFBYyxHQW9CakQ7SUFwQlksd0NBQWMiLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyBCYXNlQ29udHJvbGxlciB9IGZyb20gJy4vQmFzZUNvbnRyb2xsZXInO1xuXG5leHBvcnQgY2xhc3MgSG9tZUNvbnRyb2xsZXIgZXh0ZW5kcyBCYXNlQ29udHJvbGxlciB7XG5cbiAgICBwcml2YXRlIHN0YXRpYyBfY29tcGxldGUoKSB7XG4gICAgICAgIHJldHVybiBzdXBlci5jb21wbGV0ZSgpO1xuICAgIH1cblxuXHRwcml2YXRlIHN0YXRpYyBfcmVnaXN0ZXJJZENpdHkoKSB7XG4gICAgICAgIHJldHVybiBzdXBlci5yZWdpc3RlcklkQ2l0eSgpO1xuICAgIH1cblxuXHRwcml2YXRlIHN0YXRpYyBfcmVhZExvY2FsU3RvcmFnZUNvbWJvKCkge1xuICAgICAgICByZXR1cm4gc3VwZXIucmVhZExvY2FsU3RvcmFnZUNvbWJvKCk7XG4gICAgfVxuXG4gICAgc3RhdGljIGluaXQoKSB7XG4gICAgICAgIEhvbWVDb250cm9sbGVyLl9jb21wbGV0ZSgpO1xuICAgICAgICBIb21lQ29udHJvbGxlci5fcmVnaXN0ZXJJZENpdHkoKTtcbiAgICAgICAgSG9tZUNvbnRyb2xsZXIuX3JlYWRMb2NhbFN0b3JhZ2VDb21ibygpO1xuXHR9XG5cbn1cbiJdfQ==