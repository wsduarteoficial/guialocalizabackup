define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var HttpService = /** @class */ (function () {
        function HttpService() {
        }
        HttpService.ajax = function (parameters) {
            if (parameters === void 0) { parameters = ''; }
            return $.ajax({
                type: parameters.type ? parameters.type : "GET",
                data: parameters.data ? parameters.data : false,
                url: parameters.url ? parameters.url : false,
                dataType: parameters.dataType ? parameters.dataType : 'json',
                contentType: parameters.contentType ? parameters.contentType : 'application/json',
                crossDomain: parameters.crossDomain ? parameters.crossDomain : true,
                cache: parameters.cache ? parameters.cache : false
            });
        };
        return HttpService;
    }());
    exports.HttpService = HttpService;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiSHR0cFNlcnZpY2UuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L3NlcnZpY2VzL0h0dHBTZXJ2aWNlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7OztJQUFBO1FBQUE7UUFnQkEsQ0FBQztRQWRPLGdCQUFJLEdBQVgsVUFBWSxVQUFvQjtZQUFwQiwyQkFBQSxFQUFBLGVBQW9CO1lBRXpCLE1BQU0sQ0FBQyxDQUFDLENBQUMsSUFBSSxDQUFDO2dCQUNiLElBQUksRUFBRSxVQUFVLENBQUMsSUFBSSxDQUFDLENBQUMsQ0FBQyxVQUFVLENBQUMsSUFBSSxDQUFDLENBQUMsQ0FBQyxLQUFLO2dCQUNyRCxJQUFJLEVBQUUsVUFBVSxDQUFDLElBQUksQ0FBQyxDQUFDLENBQUMsVUFBVSxDQUFDLElBQUksQ0FBQyxDQUFDLENBQUMsS0FBSztnQkFDL0MsR0FBRyxFQUFFLFVBQVUsQ0FBQyxHQUFHLENBQUMsQ0FBQyxDQUFDLFVBQVUsQ0FBQyxHQUFHLENBQUMsQ0FBQyxDQUFDLEtBQUs7Z0JBQzVDLFFBQVEsRUFBRSxVQUFVLENBQUMsUUFBUSxDQUFDLENBQUMsQ0FBQyxVQUFVLENBQUMsUUFBUSxDQUFDLENBQUMsQ0FBQyxNQUFNO2dCQUM1RCxXQUFXLEVBQUUsVUFBVSxDQUFDLFdBQVcsQ0FBQyxDQUFDLENBQUMsVUFBVSxDQUFDLFdBQVcsQ0FBQyxDQUFDLENBQUMsa0JBQWtCO2dCQUNqRixXQUFXLEVBQUUsVUFBVSxDQUFDLFdBQVcsQ0FBQyxDQUFDLENBQUMsVUFBVSxDQUFDLFdBQVcsQ0FBQyxDQUFDLENBQUMsSUFBSTtnQkFDbkUsS0FBSyxFQUFFLFVBQVUsQ0FBQyxLQUFLLENBQUMsQ0FBQyxDQUFDLFVBQVUsQ0FBQyxLQUFLLENBQUMsQ0FBQyxDQUFDLEtBQUs7YUFDbEQsQ0FBQyxDQUFDO1FBRUosQ0FBQztRQUVGLGtCQUFDO0lBQUQsQ0FBQyxBQWhCRCxJQWdCQztJQWhCWSxrQ0FBVyIsInNvdXJjZXNDb250ZW50IjpbImV4cG9ydCBjbGFzcyBIdHRwU2VydmljZSB7XG5cblx0c3RhdGljIGFqYXgocGFyYW1ldGVyczogYW55ID0gJycpIHtcblxuICAgICAgICByZXR1cm4gJC5hamF4KHtcblx0ICAgICAgICB0eXBlOiBwYXJhbWV0ZXJzLnR5cGUgPyBwYXJhbWV0ZXJzLnR5cGUgOiBcIkdFVFwiLFxuXHRcdFx0ZGF0YTogcGFyYW1ldGVycy5kYXRhID8gcGFyYW1ldGVycy5kYXRhIDogZmFsc2UsXG5cdFx0XHR1cmw6IHBhcmFtZXRlcnMudXJsID8gcGFyYW1ldGVycy51cmwgOiBmYWxzZSxcblx0XHRcdGRhdGFUeXBlOiBwYXJhbWV0ZXJzLmRhdGFUeXBlID8gcGFyYW1ldGVycy5kYXRhVHlwZSA6ICdqc29uJyxcblx0XHRcdGNvbnRlbnRUeXBlOiBwYXJhbWV0ZXJzLmNvbnRlbnRUeXBlID8gcGFyYW1ldGVycy5jb250ZW50VHlwZSA6ICdhcHBsaWNhdGlvbi9qc29uJyxcblx0XHRcdGNyb3NzRG9tYWluOiBwYXJhbWV0ZXJzLmNyb3NzRG9tYWluID8gcGFyYW1ldGVycy5jcm9zc0RvbWFpbiA6IHRydWUsXG5cdFx0XHRjYWNoZTogcGFyYW1ldGVycy5jYWNoZSA/IHBhcmFtZXRlcnMuY2FjaGUgOiBmYWxzZVxuXHRcdH0pO1xuXG5cdH1cblxufVxuIl19