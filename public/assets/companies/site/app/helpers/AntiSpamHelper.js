define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var AntiSpamHelper = /** @class */ (function () {
        function AntiSpamHelper() {
        }
        AntiSpamHelper.antiSpam = function () {
            var random = Math.random();
            localStorage.setItem('code-anti-spam', random);
            return document.querySelector('[data-js="anti-spam"]').value = random;
        };
        return AntiSpamHelper;
    }());
    exports.AntiSpamHelper = AntiSpamHelper;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQW50aVNwYW1IZWxwZXIuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L2hlbHBlcnMvQW50aVNwYW1IZWxwZXIudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7O0lBQUE7UUFBQTtRQVFBLENBQUM7UUFOaUIsdUJBQVEsR0FBdEI7WUFDSSxJQUFJLE1BQU0sR0FBUSxJQUFJLENBQUMsTUFBTSxFQUFFLENBQUM7WUFDaEMsWUFBWSxDQUFDLE9BQU8sQ0FBQyxnQkFBZ0IsRUFBRSxNQUFNLENBQUMsQ0FBQztZQUMvQyxNQUFNLENBQUcsUUFBUSxDQUFDLGFBQWEsQ0FBQyx1QkFBdUIsQ0FBc0IsQ0FBQyxLQUFLLEdBQUcsTUFBTSxDQUFDO1FBQ2pHLENBQUM7UUFFTCxxQkFBQztJQUFELENBQUMsQUFSRCxJQVFDO0lBUlksd0NBQWMiLCJzb3VyY2VzQ29udGVudCI6WyJleHBvcnQgY2xhc3MgQW50aVNwYW1IZWxwZXIge1xuICAgIFxuICAgIHB1YmxpYyBzdGF0aWMgYW50aVNwYW0oKSB7XG4gICAgICAgIGxldCByYW5kb206IGFueSA9IE1hdGgucmFuZG9tKCk7ICAgICAgICBcbiAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ2NvZGUtYW50aS1zcGFtJywgcmFuZG9tKTtcbiAgICAgICAgcmV0dXJuICggZG9jdW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEtanM9XCJhbnRpLXNwYW1cIl0nKSBhcyBIVE1MSW5wdXRFbGVtZW50KS52YWx1ZSA9IHJhbmRvbTtcbiAgICB9XG5cbn1cbiJdfQ==