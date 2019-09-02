define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var AntiSpamHelper = /** @class */ (function () {
        function AntiSpamHelper() {
        }
        AntiSpamHelper.antiSpam = function () {
            var random = Math.random();
            return document.querySelector('[data-js="anti-spam"]').value = random;
        };
        return AntiSpamHelper;
    }());
    exports.AntiSpamHelper = AntiSpamHelper;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQW50aVNwYW0uanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyIuLi8uLi8uLi8uLi8uLi8uLi9yZXNvdXJjZXMvYXNzZXRzL2pzL3NyYy9jb21wYW5pZXMvc2l0ZS90eXBlc2NyaXB0L2hlbHBlcnMvQW50aVNwYW0udHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7O0lBQUE7UUFBQTtRQUtBLENBQUM7UUFKaUIsdUJBQVEsR0FBdEI7WUFDSSxJQUFJLE1BQU0sR0FBUSxJQUFJLENBQUMsTUFBTSxFQUFFLENBQUM7WUFDaEMsTUFBTSxDQUFHLFFBQVEsQ0FBQyxhQUFhLENBQUMsdUJBQXVCLENBQXNCLENBQUMsS0FBSyxHQUFHLE1BQU0sQ0FBQztRQUNqRyxDQUFDO1FBQ0wscUJBQUM7SUFBRCxDQUFDLEFBTEQsSUFLQztJQUxZLHdDQUFjIiwic291cmNlc0NvbnRlbnQiOlsiZXhwb3J0IGNsYXNzIEFudGlTcGFtSGVscGVyIHtcbiAgICBwdWJsaWMgc3RhdGljIGFudGlTcGFtKCkge1xuICAgICAgICBsZXQgcmFuZG9tOiBhbnkgPSBNYXRoLnJhbmRvbSgpOyAgICAgICAgXG4gICAgICAgIHJldHVybiAoIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ1tkYXRhLWpzPVwiYW50aS1zcGFtXCJdJykgYXMgSFRNTElucHV0RWxlbWVudCkudmFsdWUgPSByYW5kb207XG4gICAgfVxufVxuIl19