define(["require", "exports", "../services/HttpService"], function (require, exports, HttpService_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    var AdsView = /** @class */ (function () {
        function AdsView() {
        }
        AdsView.prototype.ads = function () {
            if (typeof PHONES_TAG_SEARCH === 'undefined') {
                return;
            }
            if (typeof PHONES_COMPANIES_SPONSORS === 'undefined') {
                return;
            }
            if (PHONES_COMPANIES_SPONSORS === 'False') {
                var dataTo = void 0, parameters = void 0, response = void 0;
                dataTo = {
                    'companies_sponsors': PHONES_COMPANIES_SPONSORS,
                    'categories_ids': PHONES_CATEGORIES_IDS,
                    'subcategories_ids': PHONES_SUBCATEGORIES_IDS,
                    'tag_search': PHONES_TAG_SEARCH,
                    'state_search': PHONES_STATE_SEARCH,
                    'city_search': PHONES_CITY_SEARCH,
                    'total': PHONES_TOTAL,
                    'total_line': PHONES_TOTAL_LINE
                };
                parameters = {
                    url: '/companies/ajax/view/make/ads/search/',
                    data: dataTo
                };
                response = HttpService_1.HttpService.ajax(parameters);
                response.done(function (data) {
                    AdsView._render(data);
                });
                response.fail(function () {
                    //alert('Erro ao carregar dados do pedido!');
                });
            }
        };
        AdsView._render = function (data) {
            if (data === void 0) { data = ''; }
            var html;
            var referrer;
            html = '';
            referrer = encodeURIComponent(window.location.href);
            if (PHONES_MOBILE == 'False') {
                if (data.length > 0) {
                    html += '<div>Anúncios relacionados</div>';
                    $.each(data, function (index, item) {
                        html += "\n                        <div class=\"text-center sponsors\">\n                            <a href=\"/companies/ads/redirect/?company=" + item.company_id + "&banner=" + item.id + "&referer=" + referrer + "\" target=\"_blank\" style=\"cursor:pointer;\">\n                                <img src=\"/storage/uploads/companies/" + item.company_id + "/banners/right-side/" + item.image + "\" class=\"img-responsive\">\n                            </a>\n                        </div>\n                    ";
                    });
                }
                else {
                    html += '<div>Anúncios</div>';
                    html += "\n                        <div class=\"text-center sponsors\">\n                        <a href=\"/anuncie-gratis\" target=\"_blank\" style=\"cursor:pointer;\">\n                            <img src=\"/img/register.png\" class=\"img-responsive\">\n                        </a>\n                    </div>\n                ";
                }
                $('.box-sponsors').html(html);
            }
            if (PHONES_MOBILE == 'True') {
                $('.box-sponsors').hide();
                var line_1 = 0;
                $.each(data, function (index, item) {
                    html = "\n                    <div>An\u00FAncios relacionados</div>\n                        <a href=\"/companies/ads/redirect/?company=" + item.company_id + "&banner=" + item.id + "&referer=" + referrer + "\" target=\"_blank\" style=\"cursor:pointer;\">\n                            <img src=\"/storage/uploads/companies/" + item.company_id + "/banners/right-side/" + item.image + "\" class=\"img-responsive\">\n                        </a>\n                    <hr>\n                ";
                    $('div.row.free-search').eq(line_1).prepend(html);
                    line_1 = line_1 += 2;
                    if (index > 2) {
                        line_1 = line_1 += 3;
                    }
                });
            }
        };
        return AdsView;
    }());
    exports.AdsView = AdsView;
});
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiQWRzVmlldy5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbIi4uLy4uLy4uLy4uLy4uLy4uL3Jlc291cmNlcy9hc3NldHMvanMvc3JjL2NvbXBhbmllcy9zaXRlL3R5cGVzY3JpcHQvdmlld3MvQWRzVmlldy50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7SUFZQTtRQUFBO1FBdUhBLENBQUM7UUFySFUscUJBQUcsR0FBVjtZQUVJLEVBQUUsQ0FBQyxDQUFDLE9BQU8saUJBQWlCLEtBQUssV0FBVyxDQUFDLENBQUMsQ0FBQztnQkFDM0MsTUFBTSxDQUFDO1lBQ1gsQ0FBQztZQUVELEVBQUUsQ0FBQyxDQUFDLE9BQU8seUJBQXlCLEtBQUssV0FBVyxDQUFDLENBQUMsQ0FBQztnQkFDbkQsTUFBTSxDQUFDO1lBQ1gsQ0FBQztZQUVELEVBQUUsQ0FBQyxDQUFDLHlCQUF5QixLQUFLLE9BQU8sQ0FBQyxDQUFDLENBQUM7Z0JBRXhDLElBQUksTUFBTSxTQUFBLEVBQUUsVUFBVSxTQUFBLEVBQUUsUUFBUSxTQUFBLENBQUM7Z0JBRWpDLE1BQU0sR0FBRztvQkFDTCxvQkFBb0IsRUFBRSx5QkFBeUI7b0JBQy9DLGdCQUFnQixFQUFFLHFCQUFxQjtvQkFDdkMsbUJBQW1CLEVBQUUsd0JBQXdCO29CQUM3QyxZQUFZLEVBQUUsaUJBQWlCO29CQUMvQixjQUFjLEVBQUUsbUJBQW1CO29CQUNuQyxhQUFhLEVBQUUsa0JBQWtCO29CQUNqQyxPQUFPLEVBQUUsWUFBWTtvQkFDckIsWUFBWSxFQUFFLGlCQUFpQjtpQkFDbEMsQ0FBQztnQkFFRixVQUFVLEdBQUU7b0JBQ1IsR0FBRyxFQUFFLHVDQUF1QztvQkFDNUMsSUFBSSxFQUFFLE1BQU07aUJBQ2YsQ0FBQztnQkFFRixRQUFRLEdBQUcseUJBQVcsQ0FBQyxJQUFJLENBQUMsVUFBVSxDQUFDLENBQUM7Z0JBRXhDLFFBQVEsQ0FBQyxJQUFJLENBQUMsVUFBUyxJQUFJO29CQUN2QixPQUFPLENBQUMsT0FBTyxDQUFDLElBQUksQ0FBQyxDQUFDO2dCQUMxQixDQUFDLENBQUMsQ0FBQztnQkFFSCxRQUFRLENBQUMsSUFBSSxDQUFDO29CQUNWLDZDQUE2QztnQkFDakQsQ0FBQyxDQUFDLENBQUM7WUFFUCxDQUFDO1FBRUwsQ0FBQztRQUVjLGVBQU8sR0FBdEIsVUFBdUIsSUFBWTtZQUFaLHFCQUFBLEVBQUEsU0FBWTtZQUUvQixJQUFJLElBQVMsQ0FBQztZQUNkLElBQUksUUFBYSxDQUFDO1lBRWxCLElBQUksR0FBRyxFQUFFLENBQUM7WUFFVixRQUFRLEdBQUcsa0JBQWtCLENBQUMsTUFBTSxDQUFDLFFBQVEsQ0FBQyxJQUFJLENBQUMsQ0FBQztZQUVwRCxFQUFFLENBQUMsQ0FBQyxhQUFhLElBQUksT0FBTyxDQUFDLENBQUMsQ0FBQztnQkFFM0IsRUFBRSxDQUFDLENBQUMsSUFBSSxDQUFDLE1BQU0sR0FBRyxDQUFDLENBQUMsQ0FBQyxDQUFDO29CQUVsQixJQUFJLElBQUksa0NBQWtDLENBQUM7b0JBRTNDLENBQUMsQ0FBQyxJQUFJLENBQUMsSUFBSSxFQUFFLFVBQVMsS0FBYSxFQUFFLElBQUk7d0JBQ3JDLElBQUksSUFBSSw0SUFFNEMsSUFBSSxDQUFDLFVBQVUsZ0JBQVcsSUFBSSxDQUFDLEVBQUUsaUJBQVksUUFBUSwrSEFDdEQsSUFBSSxDQUFDLFVBQVUsNEJBQXdCLElBQUksQ0FBQyxLQUFLLHlIQUduRyxDQUFDO29CQUNOLENBQUMsQ0FBQyxDQUFDO2dCQUVQLENBQUM7Z0JBQUMsSUFBSSxDQUFDLENBQUM7b0JBRUosSUFBSSxJQUFJLHFCQUFxQixDQUFDO29CQUU5QixJQUFJLElBQUksb1VBTVAsQ0FBQztnQkFFTixDQUFDO2dCQUVELENBQUMsQ0FBQyxlQUFlLENBQUMsQ0FBQyxJQUFJLENBQUMsSUFBSSxDQUFDLENBQUM7WUFFbEMsQ0FBQztZQUVELEVBQUUsQ0FBQyxDQUFDLGFBQWEsSUFBSSxNQUFNLENBQUMsQ0FBQyxDQUFDO2dCQUUxQixDQUFDLENBQUMsZUFBZSxDQUFDLENBQUMsSUFBSSxFQUFFLENBQUM7Z0JBRTFCLElBQUksTUFBSSxHQUFHLENBQUMsQ0FBQztnQkFFYixDQUFDLENBQUMsSUFBSSxDQUFDLElBQUksRUFBRSxVQUFTLEtBQWEsRUFBRSxJQUFJO29CQUVyQyxJQUFJLEdBQUcscUlBRTZDLElBQUksQ0FBQyxVQUFVLGdCQUFXLElBQUksQ0FBQyxFQUFFLGlCQUFZLFFBQVEsMkhBQ3RELElBQUksQ0FBQyxVQUFVLDRCQUF3QixJQUFJLENBQUMsS0FBSywyR0FHbkcsQ0FBQztvQkFFRixDQUFDLENBQUMscUJBQXFCLENBQUMsQ0FBQyxFQUFFLENBQUMsTUFBSSxDQUFDLENBQUMsT0FBTyxDQUFDLElBQUksQ0FBQyxDQUFDO29CQUVoRCxNQUFJLEdBQUcsTUFBSSxJQUFJLENBQUMsQ0FBQztvQkFFakIsRUFBRSxDQUFDLENBQUMsS0FBSyxHQUFHLENBQUMsQ0FBQyxDQUFDLENBQUM7d0JBQ1osTUFBSSxHQUFHLE1BQUksSUFBSSxDQUFDLENBQUM7b0JBQ3JCLENBQUM7Z0JBRUwsQ0FBQyxDQUFDLENBQUM7WUFFUCxDQUFDO1FBRUwsQ0FBQztRQUVMLGNBQUM7SUFBRCxDQUFDLEFBdkhELElBdUhDO0lBdkhZLDBCQUFPIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IHsgSHR0cFNlcnZpY2UgfSBmcm9tICcuLi9zZXJ2aWNlcy9IdHRwU2VydmljZSc7XG5cbmRlY2xhcmUgY29uc3QgUEhPTkVTX0NPTVBBTklFU19TUE9OU09SUzogc3RyaW5nO1xuZGVjbGFyZSBjb25zdCBQSE9ORVNfVEFHX1NFQVJDSDogc3RyaW5nO1xuZGVjbGFyZSBjb25zdCBQSE9ORVNfQ0FURUdPUklFU19JRFM6IHN0cmluZztcbmRlY2xhcmUgY29uc3QgUEhPTkVTX1NVQkNBVEVHT1JJRVNfSURTOiBzdHJpbmc7XG5kZWNsYXJlIGNvbnN0IFBIT05FU19TVEFURV9TRUFSQ0g6IHN0cmluZztcbmRlY2xhcmUgY29uc3QgUEhPTkVTX0NJVFlfU0VBUkNIOiBzdHJpbmc7XG5kZWNsYXJlIGNvbnN0IFBIT05FU19UT1RBTDogc3RyaW5nO1xuZGVjbGFyZSBjb25zdCBQSE9ORVNfVE9UQUxfTElORTogc3RyaW5nO1xuZGVjbGFyZSBjb25zdCBQSE9ORVNfTU9CSUxFOiBzdHJpbmc7XG5cbmV4cG9ydCBjbGFzcyBBZHNWaWV3IHtcblxuICAgIHB1YmxpYyBhZHMoKSB7XG5cbiAgICAgICAgaWYgKHR5cGVvZiBQSE9ORVNfVEFHX1NFQVJDSCA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmICh0eXBlb2YgUEhPTkVTX0NPTVBBTklFU19TUE9OU09SUyA9PT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuXG4gICAgICAgIGlmIChQSE9ORVNfQ09NUEFOSUVTX1NQT05TT1JTID09PSAnRmFsc2UnKSB7XG5cbiAgICAgICAgICAgIGxldCBkYXRhVG8sIHBhcmFtZXRlcnMsIHJlc3BvbnNlO1xuXG4gICAgICAgICAgICBkYXRhVG8gPSB7XG4gICAgICAgICAgICAgICAgJ2NvbXBhbmllc19zcG9uc29ycyc6IFBIT05FU19DT01QQU5JRVNfU1BPTlNPUlMsXG4gICAgICAgICAgICAgICAgJ2NhdGVnb3JpZXNfaWRzJzogUEhPTkVTX0NBVEVHT1JJRVNfSURTLFxuICAgICAgICAgICAgICAgICdzdWJjYXRlZ29yaWVzX2lkcyc6IFBIT05FU19TVUJDQVRFR09SSUVTX0lEUyxcbiAgICAgICAgICAgICAgICAndGFnX3NlYXJjaCc6IFBIT05FU19UQUdfU0VBUkNILFxuICAgICAgICAgICAgICAgICdzdGF0ZV9zZWFyY2gnOiBQSE9ORVNfU1RBVEVfU0VBUkNILFxuICAgICAgICAgICAgICAgICdjaXR5X3NlYXJjaCc6IFBIT05FU19DSVRZX1NFQVJDSCxcbiAgICAgICAgICAgICAgICAndG90YWwnOiBQSE9ORVNfVE9UQUwsXG4gICAgICAgICAgICAgICAgJ3RvdGFsX2xpbmUnOiBQSE9ORVNfVE9UQUxfTElORVxuICAgICAgICAgICAgfTtcblxuICAgICAgICAgICAgcGFyYW1ldGVycyA9e1xuICAgICAgICAgICAgICAgIHVybDogJy9jb21wYW5pZXMvYWpheC92aWV3L21ha2UvYWRzL3NlYXJjaC8nLFxuICAgICAgICAgICAgICAgIGRhdGE6IGRhdGFUb1xuICAgICAgICAgICAgfTtcblxuICAgICAgICAgICAgcmVzcG9uc2UgPSBIdHRwU2VydmljZS5hamF4KHBhcmFtZXRlcnMpO1xuXG4gICAgICAgICAgICByZXNwb25zZS5kb25lKGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgICAgICAgICAgICBBZHNWaWV3Ll9yZW5kZXIoZGF0YSk7XG4gICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgcmVzcG9uc2UuZmFpbChmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAvL2FsZXJ0KCdFcnJvIGFvIGNhcnJlZ2FyIGRhZG9zIGRvIHBlZGlkbyEnKTtcbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIH1cblxuICAgIH1cblxuICAgIHByaXZhdGUgc3RhdGljIF9yZW5kZXIoZGF0YTphbnkgPScnKSB7XG5cbiAgICAgICAgbGV0IGh0bWw6IGFueTtcbiAgICAgICAgbGV0IHJlZmVycmVyOiBhbnk7XG5cbiAgICAgICAgaHRtbCA9ICcnO1xuXG4gICAgICAgIHJlZmVycmVyID0gZW5jb2RlVVJJQ29tcG9uZW50KHdpbmRvdy5sb2NhdGlvbi5ocmVmKTtcblxuICAgICAgICBpZiAoUEhPTkVTX01PQklMRSA9PSAnRmFsc2UnKSB7XG5cbiAgICAgICAgICAgIGlmIChkYXRhLmxlbmd0aCA+IDApIHtcblxuICAgICAgICAgICAgICAgIGh0bWwgKz0gJzxkaXY+QW7Dum5jaW9zIHJlbGFjaW9uYWRvczwvZGl2Pic7XG5cbiAgICAgICAgICAgICAgICAkLmVhY2goZGF0YSwgZnVuY3Rpb24oaW5kZXg6IG51bWJlciwgaXRlbSkge1xuICAgICAgICAgICAgICAgICAgICBodG1sICs9IGBcbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJ0ZXh0LWNlbnRlciBzcG9uc29yc1wiPlxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxhIGhyZWY9XCIvY29tcGFuaWVzL2Fkcy9yZWRpcmVjdC8/Y29tcGFueT0ke2l0ZW0uY29tcGFueV9pZH0mYmFubmVyPSR7aXRlbS5pZH0mcmVmZXJlcj0ke3JlZmVycmVyfVwiIHRhcmdldD1cIl9ibGFua1wiIHN0eWxlPVwiY3Vyc29yOnBvaW50ZXI7XCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxpbWcgc3JjPVwiL3N0b3JhZ2UvdXBsb2Fkcy9jb21wYW5pZXMvJHtpdGVtLmNvbXBhbnlfaWR9L2Jhbm5lcnMvcmlnaHQtc2lkZS8keyBpdGVtLmltYWdlIH1cIiBjbGFzcz1cImltZy1yZXNwb25zaXZlXCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPC9hPlxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgICAgIGA7XG4gICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIH0gZWxzZSB7XG5cbiAgICAgICAgICAgICAgICBodG1sICs9ICc8ZGl2PkFuw7puY2lvczwvZGl2Pic7XG5cbiAgICAgICAgICAgICAgICBodG1sICs9IGBcbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJ0ZXh0LWNlbnRlciBzcG9uc29yc1wiPlxuICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj1cIi9hbnVuY2llLWdyYXRpc1wiIHRhcmdldD1cIl9ibGFua1wiIHN0eWxlPVwiY3Vyc29yOnBvaW50ZXI7XCI+XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPGltZyBzcmM9XCIvaW1nL3JlZ2lzdGVyLnBuZ1wiIGNsYXNzPVwiaW1nLXJlc3BvbnNpdmVcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDwvYT5cbiAgICAgICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICAgICAgYDtcblxuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAkKCcuYm94LXNwb25zb3JzJykuaHRtbChodG1sKTtcblxuICAgICAgICB9XG5cbiAgICAgICAgaWYgKFBIT05FU19NT0JJTEUgPT0gJ1RydWUnKSB7XG5cbiAgICAgICAgICAgICQoJy5ib3gtc3BvbnNvcnMnKS5oaWRlKCk7XG5cbiAgICAgICAgICAgIGxldCBsaW5lID0gMDtcblxuICAgICAgICAgICAgJC5lYWNoKGRhdGEsIGZ1bmN0aW9uKGluZGV4OiBudW1iZXIsIGl0ZW0pIHtcblxuICAgICAgICAgICAgICAgIGh0bWwgPSBgXG4gICAgICAgICAgICAgICAgICAgIDxkaXY+QW7Dum5jaW9zIHJlbGFjaW9uYWRvczwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj1cIi9jb21wYW5pZXMvYWRzL3JlZGlyZWN0Lz9jb21wYW55PSR7aXRlbS5jb21wYW55X2lkfSZiYW5uZXI9JHtpdGVtLmlkfSZyZWZlcmVyPSR7cmVmZXJyZXJ9XCIgdGFyZ2V0PVwiX2JsYW5rXCIgc3R5bGU9XCJjdXJzb3I6cG9pbnRlcjtcIj5cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8aW1nIHNyYz1cIi9zdG9yYWdlL3VwbG9hZHMvY29tcGFuaWVzLyR7aXRlbS5jb21wYW55X2lkfS9iYW5uZXJzL3JpZ2h0LXNpZGUvJHsgaXRlbS5pbWFnZSB9XCIgY2xhc3M9XCJpbWctcmVzcG9uc2l2ZVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgPC9hPlxuICAgICAgICAgICAgICAgICAgICA8aHI+XG4gICAgICAgICAgICAgICAgYDtcblxuICAgICAgICAgICAgICAgICQoJ2Rpdi5yb3cuZnJlZS1zZWFyY2gnKS5lcShsaW5lKS5wcmVwZW5kKGh0bWwpO1xuXG4gICAgICAgICAgICAgICAgbGluZSA9IGxpbmUgKz0gMjtcblxuICAgICAgICAgICAgICAgIGlmIChpbmRleCA+IDIpIHtcbiAgICAgICAgICAgICAgICAgICAgbGluZSA9IGxpbmUgKz0gMztcbiAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIH0pO1xuXG4gICAgICAgIH1cblxuICAgIH1cblxufVxuIl19