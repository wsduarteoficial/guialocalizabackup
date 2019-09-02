define(["require", "exports", "../services/HttpService"], function (require, exports, HttpService_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var PhoneNumberView = /** @class */ (function () {
        function PhoneNumberView() {
        }
        PhoneNumberView.prototype.viewPhone = function (el) {
            $(el).on('click', function () {
                var dataTo, response;
                var obj = $(this);
                $(this).find('.btn__text').text('Aguarde...');
                dataTo = {
                    'phone_id': obj.data('phone'),
                    'company_id': obj.data('company')
                };
                var parameters = {
                    data: dataTo,
                    url: '/companies/ajax/view/phone/'
                };
                response = HttpService_1.HttpService.ajax(parameters);
                response.done(function (data) {
                    var style;
                    var sponsors;
                    var html;
                    sponsors = obj.data('sponsors');
                    if (sponsors === true) {
                        style = 'padding: 0; text-align: letf; margin-left:15px;';
                    }
                    else {
                        style = 'margin-left:15px; text-align: letf';
                    }
                    if (PHONES_MOBILE == 'True') {
                        html = "\n\t\t\t\t\t<div class=\"row phone\">\n\t\t\t\t\t\t<div class=\"col-xs-12 col-sm-8 col-xs-8\">\n\t\t\t\t\t\t\t<div style=\"margin:0 0 0 12px;\">\n\t\t\t\t\t\t\t\t<a href=\"tel:" + data.number_mobile + "\">\n\t\t\t\t\t\t\t\t\t<strong>" + data.number_mask + "</strong>\n\t\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\n\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t<div class=\"col-xs-12 col-sm-4 col-xs-4\">\n\t\t\t\t\t\t\t<div class=\"row text-left\" style=\"margin:-15px -10px 0 0;\">\n\t\t\t\t\t\t\t\t<a href=\"tel:" + data.number_mobile + "\">\n\t\t\t\t\t\t\t\t\t<span class=\"btn btn-success btn--xs btn__text turn-on\">Ligar</span>\n\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\n\t\t\t\t\t</div>";
                    }
                    else {
                        html = "\n\t\t\t\t\t<div class=\"row phone\">\n\t\t\t\t\t\t<div class=\"col-sm-12 col-xs-12\">\n\t\t\t\t\t\t\t<div style=\"" + style + "\">\n\t\t\t\t\t\t\t\t<a href=\"tel:" + data.number_mobile + "\">\n\t\t\t\t\t\t\t\t\t<strong>" + data.number_mask + "</strong>\n\t\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>";
                    }
                    obj.fadeOut(150)
                        .html(html)
                        .fadeIn(100);
                });
                response.fail(function () {
                    alert('Erro ao carregar dados do pedido!');
                });
            });
        };
        return PhoneNumberView;
    }());
    exports.PhoneNumberView = PhoneNumberView;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiUGhvbmVOdW1iZXJWaWV3LmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiLi4vLi4vLi4vLi4vLi4vLi4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9zcmMvY29tcGFuaWVzL3NpdGUvdHlwZXNjcmlwdC92aWV3cy9QaG9uZU51bWJlclZpZXcudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7O0lBR0E7UUFBQTtRQTBGQSxDQUFDO1FBeEZPLG1DQUFTLEdBQWhCLFVBQWlCLEVBQVM7WUFFekIsQ0FBQyxDQUFDLEVBQUUsQ0FBQyxDQUFDLEVBQUUsQ0FBQyxPQUFPLEVBQUU7Z0JBRWpCLElBQUksTUFBTSxFQUFFLFFBQVEsQ0FBQztnQkFFckIsSUFBSSxHQUFHLEdBQUcsQ0FBQyxDQUFDLElBQUksQ0FBQyxDQUFDO2dCQUVsQixDQUFDLENBQUMsSUFBSSxDQUFDLENBQUMsSUFBSSxDQUFDLFlBQVksQ0FBQyxDQUFDLElBQUksQ0FBQyxZQUFZLENBQUMsQ0FBQztnQkFFOUMsTUFBTSxHQUFHO29CQUNSLFVBQVUsRUFBRSxHQUFHLENBQUMsSUFBSSxDQUFDLE9BQU8sQ0FBQztvQkFDN0IsWUFBWSxFQUFFLEdBQUcsQ0FBQyxJQUFJLENBQUMsU0FBUyxDQUFDO2lCQUNqQyxDQUFDO2dCQUVGLElBQUksVUFBVSxHQUFHO29CQUNoQixJQUFJLEVBQUUsTUFBTTtvQkFDWixHQUFHLEVBQUUsNkJBQTZCO2lCQUNsQyxDQUFDO2dCQUVGLFFBQVEsR0FBRyx5QkFBVyxDQUFDLElBQUksQ0FBQyxVQUFVLENBQUMsQ0FBQztnQkFFeEMsUUFBUSxDQUFDLElBQUksQ0FBQyxVQUFVLElBQUk7b0JBRTNCLElBQUksS0FBYSxDQUFDO29CQUNsQixJQUFJLFFBQWlCLENBQUM7b0JBQ3RCLElBQUksSUFBWSxDQUFDO29CQUVqQixRQUFRLEdBQUcsR0FBRyxDQUFDLElBQUksQ0FBQyxVQUFVLENBQUMsQ0FBQztvQkFFaEMsRUFBRSxDQUFDLENBQUMsUUFBUSxLQUFLLElBQUksQ0FBQyxDQUFDLENBQUM7d0JBQ3ZCLEtBQUssR0FBRyxpREFBaUQsQ0FBQztvQkFDM0QsQ0FBQztvQkFBQyxJQUFJLENBQUMsQ0FBQzt3QkFDUCxLQUFLLEdBQUcsb0NBQW9DLENBQUM7b0JBQzlDLENBQUM7b0JBRUQsRUFBRSxDQUFDLENBQUMsYUFBYSxJQUFJLE1BQU0sQ0FBQyxDQUFDLENBQUM7d0JBRTdCLElBQUksR0FBRyxxTEFJWSxJQUFJLENBQUMsYUFBYSx1Q0FDdEIsSUFBSSxDQUFDLFdBQVcscVJBT1osSUFBSSxDQUFDLGFBQWEsZ01BTTlCLENBQUM7b0JBR1QsQ0FBQztvQkFBQyxJQUFJLENBQUMsQ0FBQzt3QkFFUCxJQUFJLEdBQUcsd0hBR1UsS0FBSywyQ0FDSCxJQUFJLENBQUMsYUFBYSx1Q0FDdEIsSUFBSSxDQUFDLFdBQVcsZ0dBSXhCLENBQUM7b0JBRVQsQ0FBQztvQkFFRCxHQUFHLENBQUMsT0FBTyxDQUFDLEdBQUcsQ0FBQzt5QkFDZCxJQUFJLENBQUMsSUFBSSxDQUFDO3lCQUNWLE1BQU0sQ0FBQyxHQUFHLENBQUMsQ0FBQztnQkFFZixDQUFDLENBQUMsQ0FBQztnQkFFSCxRQUFRLENBQUMsSUFBSSxDQUFDO29CQUNiLEtBQUssQ0FBQyxtQ0FBbUMsQ0FBQyxDQUFDO2dCQUM1QyxDQUFDLENBQUMsQ0FBQztZQUVKLENBQUMsQ0FBQyxDQUFDO1FBRUosQ0FBQztRQUVGLHNCQUFDO0lBQUQsQ0FBQyxBQTFGRCxJQTBGQztJQTFGWSwwQ0FBZSIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7IEh0dHBTZXJ2aWNlIH0gZnJvbSBcIi4uL3NlcnZpY2VzL0h0dHBTZXJ2aWNlXCI7XG5kZWNsYXJlIHZhciBQSE9ORVNfTU9CSUxFOiBzdHJpbmc7XG5cbmV4cG9ydCBjbGFzcyBQaG9uZU51bWJlclZpZXcge1xuXG5cdHB1YmxpYyB2aWV3UGhvbmUoZWw6c3RyaW5nKTogYW55IHtcblxuXHRcdCQoZWwpLm9uKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcblxuXHRcdFx0bGV0IGRhdGFUbywgcmVzcG9uc2U7XG5cblx0XHRcdGxldCBvYmogPSAkKHRoaXMpO1xuXG5cdFx0XHQkKHRoaXMpLmZpbmQoJy5idG5fX3RleHQnKS50ZXh0KCdBZ3VhcmRlLi4uJyk7XG5cdFx0XHRcdFx0XG5cdFx0XHRkYXRhVG8gPSB7XG5cdFx0XHRcdCdwaG9uZV9pZCc6IG9iai5kYXRhKCdwaG9uZScpLFxuXHRcdFx0XHQnY29tcGFueV9pZCc6IG9iai5kYXRhKCdjb21wYW55Jylcblx0XHRcdH07XG5cdFxuXHRcdFx0bGV0IHBhcmFtZXRlcnMgPSB7XG5cdFx0XHRcdGRhdGE6IGRhdGFUbyxcblx0XHRcdFx0dXJsOiAnL2NvbXBhbmllcy9hamF4L3ZpZXcvcGhvbmUvJ1xuXHRcdFx0fTtcblxuXHRcdFx0cmVzcG9uc2UgPSBIdHRwU2VydmljZS5hamF4KHBhcmFtZXRlcnMpO1xuXG5cdFx0XHRyZXNwb25zZS5kb25lKGZ1bmN0aW9uIChkYXRhKSB7XG5cblx0XHRcdFx0bGV0IHN0eWxlOiBzdHJpbmc7XHRcdFx0XHRcblx0XHRcdFx0bGV0IHNwb25zb3JzOiBib29sZWFuO1xuXHRcdFx0XHRsZXQgaHRtbDogc3RyaW5nO1xuXG5cdFx0XHRcdHNwb25zb3JzID0gb2JqLmRhdGEoJ3Nwb25zb3JzJyk7XG5cdFx0XG5cdFx0XHRcdGlmIChzcG9uc29ycyA9PT0gdHJ1ZSkge1xuXHRcdFx0XHRcdHN0eWxlID0gJ3BhZGRpbmc6IDA7IHRleHQtYWxpZ246IGxldGY7IG1hcmdpbi1sZWZ0OjE1cHg7Jztcblx0XHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0XHRzdHlsZSA9ICdtYXJnaW4tbGVmdDoxNXB4OyB0ZXh0LWFsaWduOiBsZXRmJztcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGlmIChQSE9ORVNfTU9CSUxFID09ICdUcnVlJykge1x0XHRcdFx0XHRcblxuXHRcdFx0XHRcdGh0bWwgPSBgXG5cdFx0XHRcdFx0PGRpdiBjbGFzcz1cInJvdyBwaG9uZVwiPlxuXHRcdFx0XHRcdFx0PGRpdiBjbGFzcz1cImNvbC14cy0xMiBjb2wtc20tOCBjb2wteHMtOFwiPlxuXHRcdFx0XHRcdFx0XHQ8ZGl2IHN0eWxlPVwibWFyZ2luOjAgMCAwIDEycHg7XCI+XG5cdFx0XHRcdFx0XHRcdFx0PGEgaHJlZj1cInRlbDokeyBkYXRhLm51bWJlcl9tb2JpbGUgfVwiPlxuXHRcdFx0XHRcdFx0XHRcdFx0PHN0cm9uZz4keyBkYXRhLm51bWJlcl9tYXNrIH08L3N0cm9uZz5cblx0XHRcdFx0XHRcdFx0XHQ8L2E+XHRcdFx0XHRcdFx0XHRcblx0XHRcdFx0XHRcdFx0PC9kaXY+XHRcdFx0XHRcdFx0XG5cdFx0XHRcdFx0XHQ8L2Rpdj5cblxuXHRcdFx0XHRcdFx0PGRpdiBjbGFzcz1cImNvbC14cy0xMiBjb2wtc20tNCBjb2wteHMtNFwiPlxuXHRcdFx0XHRcdFx0XHQ8ZGl2IGNsYXNzPVwicm93IHRleHQtbGVmdFwiIHN0eWxlPVwibWFyZ2luOi0xNXB4IC0xMHB4IDAgMDtcIj5cblx0XHRcdFx0XHRcdFx0XHQ8YSBocmVmPVwidGVsOiR7IGRhdGEubnVtYmVyX21vYmlsZSB9XCI+XG5cdFx0XHRcdFx0XHRcdFx0XHQ8c3BhbiBjbGFzcz1cImJ0biBidG4tc3VjY2VzcyBidG4tLXhzIGJ0bl9fdGV4dCB0dXJuLW9uXCI+TGlnYXI8L3NwYW4+XG5cdFx0XHRcdFx0XHRcdFx0PC9hPlxuXHRcdFx0XHRcdFx0XHQ8L2Rpdj5cblx0XHRcdFx0XHRcdDwvZGl2PlxuXHRcdFx0XHRcdFxuXHRcdFx0XHRcdDwvZGl2PmA7XG5cdFx0XHRcdFxuXG5cdFx0XHRcdH0gZWxzZSB7XG5cblx0XHRcdFx0XHRodG1sID0gYFxuXHRcdFx0XHRcdDxkaXYgY2xhc3M9XCJyb3cgcGhvbmVcIj5cblx0XHRcdFx0XHRcdDxkaXYgY2xhc3M9XCJjb2wtc20tMTIgY29sLXhzLTEyXCI+XG5cdFx0XHRcdFx0XHRcdDxkaXYgc3R5bGU9XCIkeyBzdHlsZSB9XCI+XG5cdFx0XHRcdFx0XHRcdFx0PGEgaHJlZj1cInRlbDokeyBkYXRhLm51bWJlcl9tb2JpbGUgfVwiPlxuXHRcdFx0XHRcdFx0XHRcdFx0PHN0cm9uZz4keyBkYXRhLm51bWJlcl9tYXNrIH08L3N0cm9uZz5cblx0XHRcdFx0XHRcdFx0XHQ8L2E+XG5cdFx0XHRcdFx0XHRcdDwvZGl2PlxuXHRcdFx0XHRcdFx0PC9kaXY+XG5cdFx0XHRcdFx0PC9kaXY+YDtcblxuXHRcdFx0XHR9XHRcblx0XHRcblx0XHRcdFx0b2JqLmZhZGVPdXQoMTUwKVxuXHRcdFx0XHRcdC5odG1sKGh0bWwpXG5cdFx0XHRcdFx0LmZhZGVJbigxMDApO1xuXG5cdFx0XHR9KTtcblxuXHRcdFx0cmVzcG9uc2UuZmFpbChmdW5jdGlvbiAoKSB7XG5cdFx0XHRcdGFsZXJ0KCdFcnJvIGFvIGNhcnJlZ2FyIGRhZG9zIGRvIHBlZGlkbyEnKTtcblx0XHRcdH0pO1xuXG5cdFx0fSk7XG5cblx0fVxuXG59XG4iXX0=