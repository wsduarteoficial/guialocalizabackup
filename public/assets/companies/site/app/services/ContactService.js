define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var ContactService = /** @class */ (function () {
        function ContactService() {
        }
        ContactService.sendMail = function (dataForm) {
            $('[data-js="send-message"]')
                .text('Enviando...')
                .attr('disabled', true);
            $.post("/contact/sendmail", dataForm)
                .done(function (data) {
                $('[data-js="name"]').val('').attr('disabled', true);
                $('[data-js="email"]').val('').attr('disabled', true);
                $('[data-js="subject"]').val('').attr('disabled', true);
                $('[data-js="message"]').val('').attr('disabled', true);
                $('[data-js="send-message"]')
                    .text('Mensagem Enviada!')
                    .attr('disabled', true);
                $.alert({
                    title: 'Atenção!',
                    content: 'Sua menssagem foi enviada com sucesso!',
                });
            });
        };
        return ContactService;
    }());
    exports.ContactService = ContactService;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQ29udGFjdFNlcnZpY2UuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L3NlcnZpY2VzL0NvbnRhY3RTZXJ2aWNlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7OztJQUVBO1FBQUE7UUE2QkEsQ0FBQztRQTNCVSx1QkFBUSxHQUFmLFVBQWdCLFFBQWM7WUFFMUIsQ0FBQyxDQUFDLDBCQUEwQixDQUFDO2lCQUN4QixJQUFJLENBQUMsYUFBYSxDQUFDO2lCQUNuQixJQUFJLENBQUMsVUFBVSxFQUFFLElBQUksQ0FBQyxDQUFDO1lBRTVCLENBQUMsQ0FBQyxJQUFJLENBQUUsbUJBQW1CLEVBQUUsUUFBUSxDQUFDO2lCQUNyQyxJQUFJLENBQUMsVUFBVSxJQUFvQjtnQkFFaEMsQ0FBQyxDQUFDLGtCQUFrQixDQUFDLENBQUMsR0FBRyxDQUFDLEVBQUUsQ0FBQyxDQUFDLElBQUksQ0FBQyxVQUFVLEVBQUUsSUFBSSxDQUFDLENBQUM7Z0JBQ3JELENBQUMsQ0FBQyxtQkFBbUIsQ0FBQyxDQUFDLEdBQUcsQ0FBQyxFQUFFLENBQUMsQ0FBQyxJQUFJLENBQUMsVUFBVSxFQUFFLElBQUksQ0FBQyxDQUFDO2dCQUN0RCxDQUFDLENBQUMscUJBQXFCLENBQUMsQ0FBQyxHQUFHLENBQUMsRUFBRSxDQUFDLENBQUMsSUFBSSxDQUFDLFVBQVUsRUFBRSxJQUFJLENBQUMsQ0FBQztnQkFDeEQsQ0FBQyxDQUFDLHFCQUFxQixDQUFDLENBQUMsR0FBRyxDQUFDLEVBQUUsQ0FBQyxDQUFDLElBQUksQ0FBQyxVQUFVLEVBQUUsSUFBSSxDQUFDLENBQUM7Z0JBRXhELENBQUMsQ0FBQywwQkFBMEIsQ0FBQztxQkFDeEIsSUFBSSxDQUFDLG1CQUFtQixDQUFDO3FCQUN6QixJQUFJLENBQUMsVUFBVSxFQUFFLElBQUksQ0FBQyxDQUFDO2dCQUU1QixDQUFDLENBQUMsS0FBSyxDQUFDO29CQUNKLEtBQUssRUFBRSxVQUFVO29CQUNqQixPQUFPLEVBQUUsd0NBQXdDO2lCQUNwRCxDQUFDLENBQUM7WUFFUCxDQUFDLENBQUMsQ0FBQztRQUVQLENBQUM7UUFFTCxxQkFBQztJQUFELENBQUMsQUE3QkQsSUE2QkM7SUE3Qlksd0NBQWMiLCJzb3VyY2VzQ29udGVudCI6WyJkZWNsYXJlIGxldCAkOmFueSxhbGVydDogRnVuY3Rpb247XG5cbmV4cG9ydCBjbGFzcyBDb250YWN0U2VydmljZSB7XG5cbiAgICBzdGF0aWMgc2VuZE1haWwoZGF0YUZvcm0gOiBhbnkpIHtcblxuICAgICAgICAkKCdbZGF0YS1qcz1cInNlbmQtbWVzc2FnZVwiXScpXG4gICAgICAgICAgICAudGV4dCgnRW52aWFuZG8uLi4nKVxuICAgICAgICAgICAgLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG5cbiAgICAgICAgJC5wb3N0KCBcIi9jb250YWN0L3NlbmRtYWlsXCIsIGRhdGFGb3JtKVxuICAgICAgICAuZG9uZShmdW5jdGlvbiggZGF0YSA6IEFycmF5PHN0cmluZz4gKSB7XG5cbiAgICAgICAgICAgICQoJ1tkYXRhLWpzPVwibmFtZVwiXScpLnZhbCgnJykuYXR0cignZGlzYWJsZWQnLCB0cnVlKTtcbiAgICAgICAgICAgICQoJ1tkYXRhLWpzPVwiZW1haWxcIl0nKS52YWwoJycpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG4gICAgICAgICAgICAkKCdbZGF0YS1qcz1cInN1YmplY3RcIl0nKS52YWwoJycpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG4gICAgICAgICAgICAkKCdbZGF0YS1qcz1cIm1lc3NhZ2VcIl0nKS52YWwoJycpLmF0dHIoJ2Rpc2FibGVkJywgdHJ1ZSk7XG5cbiAgICAgICAgICAgICQoJ1tkYXRhLWpzPVwic2VuZC1tZXNzYWdlXCJdJylcbiAgICAgICAgICAgICAgICAudGV4dCgnTWVuc2FnZW0gRW52aWFkYSEnKVxuICAgICAgICAgICAgICAgIC5hdHRyKCdkaXNhYmxlZCcsIHRydWUpO1xuXG4gICAgICAgICAgICAkLmFsZXJ0KHtcbiAgICAgICAgICAgICAgICB0aXRsZTogJ0F0ZW7Dp8OjbyEnLFxuICAgICAgICAgICAgICAgIGNvbnRlbnQ6ICdTdWEgbWVuc3NhZ2VtIGZvaSBlbnZpYWRhIGNvbSBzdWNlc3NvIScsXG4gICAgICAgICAgICB9KTtcblxuICAgICAgICB9KTtcblxuICAgIH1cblxufVxuIl19