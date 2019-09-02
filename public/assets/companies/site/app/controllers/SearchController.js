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
define(["require", "exports", "./BaseController", "../views/AdsView", "../views/PhoneNumberView"], function (require, exports, BaseController_1, AdsView_1, PhoneNumberView_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var SearchController = /** @class */ (function (_super) {
        __extends(SearchController, _super);
        function SearchController() {
            return _super !== null && _super.apply(this, arguments) || this;
        }
        SearchController._complete = function () {
            return _super.complete.call(this);
        };
        SearchController._registerIdCity = function () {
            return _super.registerIdCity.call(this);
        };
        SearchController._readLocalStorageCombo = function () {
            return _super.readLocalStorageCombo.call(this);
        };
        SearchController._loadResponse = function () {
            $("section [data-load='true']").fadeIn(500);
            $('#loading').addClass('hide');
        };
        SearchController._clearSpaceDuplicate = function () {
            $('#autocomplete').keypress(function () {
                var str = $(this).val();
                str = str.replace(/\s{2,}/g, ' ');
                $(this).val(str);
            });
        };
        SearchController._loadClickTurnOn = function () {
            $(document).on('click', 'body', function () {
                $(this).on('click', '.turn-on', function () {
                    window.location.href;
                });
            });
        };
        SearchController._viewPhone = function () {
            var view = new PhoneNumberView_1.PhoneNumberView();
            view.viewPhone('.jq_view_number_phone');
        };
        SearchController._ads = function () {
            var ads = new AdsView_1.AdsView();
            ads.ads();
        };
        SearchController.init = function () {
            SearchController._loadResponse();
            SearchController._viewPhone();
            SearchController._complete();
            SearchController._ads();
            SearchController._registerIdCity();
            SearchController._readLocalStorageCombo();
            SearchController._clearSpaceDuplicate();
            SearchController._loadClickTurnOn();
        };
        return SearchController;
    }(BaseController_1.BaseController));
    exports.SearchController = SearchController;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiU2VhcmNoQ29udHJvbGxlci5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbIi4uLy4uLy4uLy4uLy4uLy4uL3Jlc291cmNlcy9hc3NldHMvanMvc3JjL2NvbXBhbmllcy9zaXRlL3R5cGVzY3JpcHQvY29udHJvbGxlcnMvU2VhcmNoQ29udHJvbGxlci50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7O0lBSUE7UUFBc0Msb0NBQWM7UUFBcEQ7O1FBNkRBLENBQUM7UUEzRGtCLDBCQUFTLEdBQXhCO1lBQ0ksTUFBTSxDQUFDLE9BQU0sUUFBUSxXQUFFLENBQUM7UUFDNUIsQ0FBQztRQUVXLGdDQUFlLEdBQTlCO1lBQ08sTUFBTSxDQUFDLE9BQU0sY0FBYyxXQUFFLENBQUM7UUFDbEMsQ0FBQztRQUVXLHVDQUFzQixHQUFyQztZQUNPLE1BQU0sQ0FBQyxPQUFNLHFCQUFxQixXQUFFLENBQUM7UUFDekMsQ0FBQztRQUVjLDhCQUFhLEdBQTVCO1lBQ0ksQ0FBQyxDQUFDLDRCQUE0QixDQUFDLENBQUMsTUFBTSxDQUFDLEdBQUcsQ0FBQyxDQUFDO1lBQzVDLENBQUMsQ0FBQyxVQUFVLENBQUMsQ0FBQyxRQUFRLENBQUMsTUFBTSxDQUFDLENBQUM7UUFDbkMsQ0FBQztRQUVjLHFDQUFvQixHQUFuQztZQUVJLENBQUMsQ0FBQyxlQUFlLENBQUMsQ0FBQyxRQUFRLENBQUM7Z0JBQ3hCLElBQUksR0FBRyxHQUFPLENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQyxHQUFHLEVBQUUsQ0FBQztnQkFDNUIsR0FBRyxHQUFHLEdBQUcsQ0FBQyxPQUFPLENBQUMsU0FBUyxFQUFFLEdBQUcsQ0FBQyxDQUFDO2dCQUNsQyxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUMsR0FBRyxDQUFFLEdBQUcsQ0FBRSxDQUFDO1lBRXZCLENBQUMsQ0FBQyxDQUFDO1FBRVAsQ0FBQztRQUVjLGlDQUFnQixHQUEvQjtZQUNJLENBQUMsQ0FBQyxRQUFRLENBQUMsQ0FBQyxFQUFFLENBQUMsT0FBTyxFQUFFLE1BQU0sRUFBRTtnQkFDNUIsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDLEVBQUUsQ0FBQyxPQUFPLEVBQUUsVUFBVSxFQUFFO29CQUM1QixNQUFNLENBQUMsUUFBUSxDQUFDLElBQUksQ0FBQztnQkFDekIsQ0FBQyxDQUFDLENBQUM7WUFDUCxDQUFDLENBQUMsQ0FBQztRQUNQLENBQUM7UUFFYywyQkFBVSxHQUF6QjtZQUNJLElBQU0sSUFBSSxHQUFHLElBQUksaUNBQWUsRUFBRSxDQUFDO1lBQ25DLElBQUksQ0FBQyxTQUFTLENBQUMsdUJBQXVCLENBQUMsQ0FBQztRQUM1QyxDQUFDO1FBRWMscUJBQUksR0FBbkI7WUFDSSxJQUFNLEdBQUcsR0FBRyxJQUFJLGlCQUFPLEVBQUUsQ0FBQztZQUMxQixHQUFHLENBQUMsR0FBRyxFQUFFLENBQUM7UUFDZCxDQUFDO1FBRU0scUJBQUksR0FBWDtZQUVJLGdCQUFnQixDQUFDLGFBQWEsRUFBRSxDQUFDO1lBQ2pDLGdCQUFnQixDQUFDLFVBQVUsRUFBRSxDQUFDO1lBQzlCLGdCQUFnQixDQUFDLFNBQVMsRUFBRSxDQUFDO1lBQzdCLGdCQUFnQixDQUFDLElBQUksRUFBRSxDQUFDO1lBQ3hCLGdCQUFnQixDQUFDLGVBQWUsRUFBRSxDQUFDO1lBQ25DLGdCQUFnQixDQUFDLHNCQUFzQixFQUFFLENBQUM7WUFDMUMsZ0JBQWdCLENBQUMsb0JBQW9CLEVBQUUsQ0FBQztZQUN4QyxnQkFBZ0IsQ0FBQyxnQkFBZ0IsRUFBRSxDQUFDO1FBRXhDLENBQUM7UUFFTCx1QkFBQztJQUFELENBQUMsQUE3REQsQ0FBc0MsK0JBQWMsR0E2RG5EO0lBN0RZLDRDQUFnQiIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7IEJhc2VDb250cm9sbGVyIH0gZnJvbSAnLi9CYXNlQ29udHJvbGxlcic7XG5pbXBvcnQge0Fkc1ZpZXd9IGZyb20gJy4uL3ZpZXdzL0Fkc1ZpZXcnO1xuaW1wb3J0IHtQaG9uZU51bWJlclZpZXd9IGZyb20gJy4uL3ZpZXdzL1Bob25lTnVtYmVyVmlldyc7XG5cbmV4cG9ydCBjbGFzcyBTZWFyY2hDb250cm9sbGVyIGV4dGVuZHMgQmFzZUNvbnRyb2xsZXIge1xuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX2NvbXBsZXRlKCkge1xuICAgICAgICByZXR1cm4gc3VwZXIuY29tcGxldGUoKTtcbiAgICB9XG5cblx0cHJpdmF0ZSBzdGF0aWMgX3JlZ2lzdGVySWRDaXR5KCkge1xuICAgICAgICByZXR1cm4gc3VwZXIucmVnaXN0ZXJJZENpdHkoKTtcbiAgICB9XG5cblx0cHJpdmF0ZSBzdGF0aWMgX3JlYWRMb2NhbFN0b3JhZ2VDb21ibygpIHtcbiAgICAgICAgcmV0dXJuIHN1cGVyLnJlYWRMb2NhbFN0b3JhZ2VDb21ibygpO1xuICAgIH1cblxuICAgIHByaXZhdGUgc3RhdGljIF9sb2FkUmVzcG9uc2UoKSB7XG4gICAgICAgICQoXCJzZWN0aW9uIFtkYXRhLWxvYWQ9J3RydWUnXVwiKS5mYWRlSW4oNTAwKTtcbiAgICAgICAgJCgnI2xvYWRpbmcnKS5hZGRDbGFzcygnaGlkZScpO1xuICAgIH1cblxuICAgIHByaXZhdGUgc3RhdGljIF9jbGVhclNwYWNlRHVwbGljYXRlKCkge1xuXG4gICAgICAgICQoJyNhdXRvY29tcGxldGUnKS5rZXlwcmVzcyhmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIGxldCBzdHI6YW55ID0gJCh0aGlzKS52YWwoKTtcbiAgICAgICAgICAgIHN0ciA9IHN0ci5yZXBsYWNlKC9cXHN7Mix9L2csICcgJyk7XG4gICAgICAgICAgICAkKHRoaXMpLnZhbCggc3RyICk7XG5cbiAgICAgICAgfSk7XG5cbiAgICB9XG5cbiAgICBwcml2YXRlIHN0YXRpYyBfbG9hZENsaWNrVHVybk9uKCl7XG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdjbGljaycsICdib2R5JywgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgICQodGhpcykub24oJ2NsaWNrJywgJy50dXJuLW9uJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uLmhyZWY7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgcHJpdmF0ZSBzdGF0aWMgX3ZpZXdQaG9uZSgpIHtcbiAgICAgICAgY29uc3QgdmlldyA9IG5ldyBQaG9uZU51bWJlclZpZXcoKTtcbiAgICAgICAgdmlldy52aWV3UGhvbmUoJy5qcV92aWV3X251bWJlcl9waG9uZScpO1xuICAgIH1cblxuICAgIHByaXZhdGUgc3RhdGljIF9hZHMoKSB7XG4gICAgICAgIGNvbnN0IGFkcyA9IG5ldyBBZHNWaWV3KCk7XG4gICAgICAgIGFkcy5hZHMoKTtcbiAgICB9XG5cbiAgICBzdGF0aWMgaW5pdCgpIHtcblxuICAgICAgICBTZWFyY2hDb250cm9sbGVyLl9sb2FkUmVzcG9uc2UoKTtcbiAgICAgICAgU2VhcmNoQ29udHJvbGxlci5fdmlld1Bob25lKCk7XG4gICAgICAgIFNlYXJjaENvbnRyb2xsZXIuX2NvbXBsZXRlKCk7XG4gICAgICAgIFNlYXJjaENvbnRyb2xsZXIuX2FkcygpO1xuICAgICAgICBTZWFyY2hDb250cm9sbGVyLl9yZWdpc3RlcklkQ2l0eSgpO1xuICAgICAgICBTZWFyY2hDb250cm9sbGVyLl9yZWFkTG9jYWxTdG9yYWdlQ29tYm8oKTtcbiAgICAgICAgU2VhcmNoQ29udHJvbGxlci5fY2xlYXJTcGFjZUR1cGxpY2F0ZSgpO1xuICAgICAgICBTZWFyY2hDb250cm9sbGVyLl9sb2FkQ2xpY2tUdXJuT24oKTtcblxuICAgIH1cblxufVxuIl19