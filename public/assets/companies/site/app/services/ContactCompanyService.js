define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var ContactCompanyService = /** @class */ (function () {
        function ContactCompanyService() {
        }
        ContactCompanyService.sendMail = function (dataForm) {
            $('[data-js="send-message"]')
                .text('Enviando...')
                .attr('disabled', true);
            $.post("/contact/company/sendmail", dataForm)
                .done(function (data) {
                $('[data-js="name"]').val('').attr('disabled', true);
                $('[data-js="email"]').val('').attr('disabled', true);
                $('[data-js="email_subject"]').val('').attr('disabled', true);
                $('[data-js="email_message"]').val('').attr('disabled', true);
                $('[data-js="send-message"]')
                    .text('Mensagem Enviada!')
                    .attr('disabled', true);
                $.alert({
                    title: 'Atenção!',
                    content: 'Sua menssagem foi enviada com sucesso!',
                });
            });
        };
        return ContactCompanyService;
    }());
    exports.ContactCompanyService = ContactCompanyService;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQ29udGFjdENvbXBhbnlTZXJ2aWNlLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiLi4vLi4vLi4vLi4vLi4vLi4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9zcmMvY29tcGFuaWVzL3NpdGUvdHlwZXNjcmlwdC9zZXJ2aWNlcy9Db250YWN0Q29tcGFueVNlcnZpY2UudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7O0lBRUE7UUFBQTtRQThCQSxDQUFDO1FBNUJVLDhCQUFRLEdBQWYsVUFBZ0IsUUFBYztZQUUxQixDQUFDLENBQUMsMEJBQTBCLENBQUM7aUJBQ3hCLElBQUksQ0FBQyxhQUFhLENBQUM7aUJBQ25CLElBQUksQ0FBQyxVQUFVLEVBQUUsSUFBSSxDQUFDLENBQUM7WUFHNUIsQ0FBQyxDQUFDLElBQUksQ0FBRSwyQkFBMkIsRUFBRSxRQUFRLENBQUM7aUJBQzdDLElBQUksQ0FBQyxVQUFVLElBQW9CO2dCQUVoQyxDQUFDLENBQUMsa0JBQWtCLENBQUMsQ0FBQyxHQUFHLENBQUMsRUFBRSxDQUFDLENBQUMsSUFBSSxDQUFDLFVBQVUsRUFBRSxJQUFJLENBQUMsQ0FBQztnQkFDckQsQ0FBQyxDQUFDLG1CQUFtQixDQUFDLENBQUMsR0FBRyxDQUFDLEVBQUUsQ0FBQyxDQUFDLElBQUksQ0FBQyxVQUFVLEVBQUUsSUFBSSxDQUFDLENBQUM7Z0JBQ3RELENBQUMsQ0FBQywyQkFBMkIsQ0FBQyxDQUFDLEdBQUcsQ0FBQyxFQUFFLENBQUMsQ0FBQyxJQUFJLENBQUMsVUFBVSxFQUFFLElBQUksQ0FBQyxDQUFDO2dCQUM5RCxDQUFDLENBQUMsMkJBQTJCLENBQUMsQ0FBQyxHQUFHLENBQUMsRUFBRSxDQUFDLENBQUMsSUFBSSxDQUFDLFVBQVUsRUFBRSxJQUFJLENBQUMsQ0FBQztnQkFFOUQsQ0FBQyxDQUFDLDBCQUEwQixDQUFDO3FCQUN4QixJQUFJLENBQUMsbUJBQW1CLENBQUM7cUJBQ3pCLElBQUksQ0FBQyxVQUFVLEVBQUUsSUFBSSxDQUFDLENBQUM7Z0JBRTVCLENBQUMsQ0FBQyxLQUFLLENBQUM7b0JBQ0osS0FBSyxFQUFFLFVBQVU7b0JBQ2pCLE9BQU8sRUFBRSx3Q0FBd0M7aUJBQ3BELENBQUMsQ0FBQztZQUVQLENBQUMsQ0FBQyxDQUFDO1FBRVAsQ0FBQztRQUVMLDRCQUFDO0lBQUQsQ0FBQyxBQTlCRCxJQThCQztJQTlCWSxzREFBcUIiLCJzb3VyY2VzQ29udGVudCI6WyJkZWNsYXJlIGxldCAkOmFueSxhbGVydDogRnVuY3Rpb247XG5cbmV4cG9ydCBjbGFzcyBDb250YWN0Q29tcGFueVNlcnZpY2Uge1xuXG4gICAgc3RhdGljIHNlbmRNYWlsKGRhdGFGb3JtIDogYW55KSB7XG5cbiAgICAgICAgJCgnW2RhdGEtanM9XCJzZW5kLW1lc3NhZ2VcIl0nKVxuICAgICAgICAgICAgLnRleHQoJ0VudmlhbmRvLi4uJylcbiAgICAgICAgICAgIC5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgICAgICAgXG5cbiAgICAgICAgJC5wb3N0KCBcIi9jb250YWN0L2NvbXBhbnkvc2VuZG1haWxcIiwgZGF0YUZvcm0pXG4gICAgICAgIC5kb25lKGZ1bmN0aW9uKCBkYXRhIDogQXJyYXk8c3RyaW5nPiApIHtcblxuICAgICAgICAgICAgJCgnW2RhdGEtanM9XCJuYW1lXCJdJykudmFsKCcnKS5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xuICAgICAgICAgICAgJCgnW2RhdGEtanM9XCJlbWFpbFwiXScpLnZhbCgnJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgICAgICQoJ1tkYXRhLWpzPVwiZW1haWxfc3ViamVjdFwiXScpLnZhbCgnJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgICAgICQoJ1tkYXRhLWpzPVwiZW1haWxfbWVzc2FnZVwiXScpLnZhbCgnJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcblxuICAgICAgICAgICAgJCgnW2RhdGEtanM9XCJzZW5kLW1lc3NhZ2VcIl0nKVxuICAgICAgICAgICAgICAgIC50ZXh0KCdNZW5zYWdlbSBFbnZpYWRhIScpXG4gICAgICAgICAgICAgICAgLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG5cbiAgICAgICAgICAgICQuYWxlcnQoe1xuICAgICAgICAgICAgICAgIHRpdGxlOiAnQXRlbsOnw6NvIScsXG4gICAgICAgICAgICAgICAgY29udGVudDogJ1N1YSBtZW5zc2FnZW0gZm9pIGVudmlhZGEgY29tIHN1Y2Vzc28hJyxcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIH0pO1xuXG4gICAgfVxuXG59XG4iXX0=