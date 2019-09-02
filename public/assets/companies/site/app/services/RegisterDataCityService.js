define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var RegisterDataCityService = /** @class */ (function () {
        function RegisterDataCityService() {
        }
        RegisterDataCityService.prototype.register = function (el) {
            $(el).bind('change', function () {
                if ($(this).find(':selected').data('state') <= 0) {
                    return;
                }
                var stateId;
                var cityId;
                stateId = $(this).find(':selected').data('state');
                cityId = $(this).val();
                $('input[name="state"]').val(stateId);
                $('input[name="city"]').val(cityId);
                localStorage.setItem('phoneCityId', cityId);
                localStorage.setItem('phoneStateId', stateId);
            });
        };
        return RegisterDataCityService;
    }());
    exports.RegisterDataCityService = RegisterDataCityService;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiUmVnaXN0ZXJEYXRhQ2l0eVNlcnZpY2UuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L3NlcnZpY2VzL1JlZ2lzdGVyRGF0YUNpdHlTZXJ2aWNlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7OztJQUFBO1FBQUE7UUEwQkEsQ0FBQztRQXhCRywwQ0FBUSxHQUFSLFVBQVMsRUFBUztZQUVkLENBQUMsQ0FBQyxFQUFFLENBQUMsQ0FBQyxJQUFJLENBQUMsUUFBUSxFQUFFO2dCQUVqQixFQUFFLENBQUMsQ0FBQyxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUMsSUFBSSxDQUFDLFdBQVcsQ0FBQyxDQUFDLElBQUksQ0FBQyxPQUFPLENBQUMsSUFBSSxDQUFDLENBQUMsQ0FBQyxDQUFDO29CQUMvQyxNQUFNLENBQUM7Z0JBQ1gsQ0FBQztnQkFFRCxJQUFJLE9BQVksQ0FBQztnQkFDakIsSUFBSSxNQUFXLENBQUM7Z0JBRWhCLE9BQU8sR0FBRyxDQUFDLENBQUMsSUFBSSxDQUFDLENBQUMsSUFBSSxDQUFDLFdBQVcsQ0FBQyxDQUFDLElBQUksQ0FBQyxPQUFPLENBQUMsQ0FBQztnQkFDbEQsTUFBTSxHQUFHLENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQyxHQUFHLEVBQUUsQ0FBQztnQkFFdkIsQ0FBQyxDQUFDLHFCQUFxQixDQUFDLENBQUMsR0FBRyxDQUFDLE9BQU8sQ0FBQyxDQUFDO2dCQUN0QyxDQUFDLENBQUMsb0JBQW9CLENBQUMsQ0FBQyxHQUFHLENBQUMsTUFBTSxDQUFDLENBQUM7Z0JBRXBDLFlBQVksQ0FBQyxPQUFPLENBQUMsYUFBYSxFQUFFLE1BQU0sQ0FBQyxDQUFDO2dCQUM1QyxZQUFZLENBQUMsT0FBTyxDQUFDLGNBQWMsRUFBRSxPQUFPLENBQUMsQ0FBQztZQUVsRCxDQUFDLENBQUMsQ0FBQztRQUVQLENBQUM7UUFFTCw4QkFBQztJQUFELENBQUMsQUExQkQsSUEwQkM7SUExQlksMERBQXVCIiwic291cmNlc0NvbnRlbnQiOlsiZXhwb3J0IGNsYXNzIFJlZ2lzdGVyRGF0YUNpdHlTZXJ2aWNlIHtcblxuICAgIHJlZ2lzdGVyKGVsOnN0cmluZykge1xuXG4gICAgICAgICQoZWwpLmJpbmQoJ2NoYW5nZScsIGZ1bmN0aW9uICgpIHsgICAgICAgICAgICAgIFxuXG4gICAgICAgICAgICBpZiAoJCh0aGlzKS5maW5kKCc6c2VsZWN0ZWQnKS5kYXRhKCdzdGF0ZScpIDw9IDApIHtcbiAgICAgICAgICAgICAgICByZXR1cm47XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGxldCBzdGF0ZUlkOiBhbnk7XG4gICAgICAgICAgICBsZXQgY2l0eUlkOiBhbnk7XG5cbiAgICAgICAgICAgIHN0YXRlSWQgPSAkKHRoaXMpLmZpbmQoJzpzZWxlY3RlZCcpLmRhdGEoJ3N0YXRlJyk7XG4gICAgICAgICAgICBjaXR5SWQgPSAkKHRoaXMpLnZhbCgpO1xuXG4gICAgICAgICAgICAkKCdpbnB1dFtuYW1lPVwic3RhdGVcIl0nKS52YWwoc3RhdGVJZCk7XG4gICAgICAgICAgICAkKCdpbnB1dFtuYW1lPVwiY2l0eVwiXScpLnZhbChjaXR5SWQpO1xuXG4gICAgICAgICAgICBsb2NhbFN0b3JhZ2Uuc2V0SXRlbSgncGhvbmVDaXR5SWQnLCBjaXR5SWQpO1xuICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ3Bob25lU3RhdGVJZCcsIHN0YXRlSWQpO1xuICAgICAgICAgICAgXG4gICAgICAgIH0pO1xuXG4gICAgfVxuXG59XG4iXX0=