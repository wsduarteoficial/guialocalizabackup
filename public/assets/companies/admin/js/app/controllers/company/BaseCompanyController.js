'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var BaseCompanyController = function () {
    function BaseCompanyController() {
        _classCallCheck(this, BaseCompanyController);
    }

    _createClass(BaseCompanyController, [{
        key: 'checkPhone',
        value: function checkPhone() {

            CheckRegisteredPhone.fixed();
            CheckRegisteredPhone.cell();
        }
    }, {
        key: 'changeCategory',
        value: function changeCategory() {
            //jq_disabled

            $(document).on('click', '.dropdown-toggle', function () {
                $('.jq_disabled').hide();
            });

            $(document).on('change', 'select[name="category_id"]', function () {

                var categoryId = $(this).val();

                categoryId = parseInt(categoryId);

                if (categoryId > 0) {

                    $('.jq_disabled').hide();
                    ComboSubcategoryView.subcategories(categoryId);
                } else {
                    $('.jq_disabled').show();
                }
            });
        }
    }, {
        key: 'maskPhone',
        value: function maskPhone() {
            $(document).on('click', 'body', function () {
                if ($.mask) {
                    $('input[name="phone_cell[]"]').mask('(99) 9-9999-9999');
                    $('input[name="phone_fixed[]"]').mask('(99) 9999-9999');
                }
            });
        }
    }, {
        key: 'countCharactersSEO',
        value: function countCharactersSEO() {

            $('#id_title').keyup(function () {
                CharacterCountHelper.count($(this), 60, 70, $('#titleCont'));
            });

            $('#id_description').keyup(function () {
                CharacterCountHelper.count($(this), 310, 320, $('#descCont'));
            });

            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 800);
            });
        }
    }, {
        key: 'openModalRegister',
        value: function openModalRegister(el) {

            $(el).on('click', function () {

                var stateName = $("select[name=state_id] option:selected").text();
                var cityName = $("select[name=city_id] option:selected").text();
                var cityId = $('select[name=city_id]').find('option:selected').val();

                if (parseInt(cityId) > 0) {

                    $('.text-register-city').html('<span class="bold">' + stateName + ' / ' + cityName + '</span>');
                    $('.hidden-register-city-id').val(cityId);
                    $('.jq_disabled').removeAttr('disabled');
                } else {
                    $('.text-register-city').html('<span class="bold">Informe o CEP no Formul\xE1rio</span>');
                    $('.jq_disabled').attr('disabled', true);
                }
            });
        }
    }, {
        key: 'submitModal',
        value: function submitModal(form) {

            $(form).on('submit', function (e) {

                e.preventDefault();

                var dataTo = $(this).serialize();

                if (form === 'form[name=create-register-district]') {
                    CompanyDistrictService.registerData(dataTo);
                } else if (form === 'form[name=create-register-place]') {
                    CompanyPlaceService.registerData(dataTo);
                }

                return false;
            });
        }
    }, {
        key: 'focusZipcode',
        value: function focusZipcode() {

            $(document).on('click', '.btn-outline', function () {
                $('#id_zipcode').focus();
            });
        }
    }, {
        key: 'checkFillDistrictIsSuggest',
        value: function checkFillDistrictIsSuggest() {

            var district = $('input[name="district"]').val();

            if (district.length > 0) {

                var district_id = $('input[name="district_id"]').val();

                if (district_id > 0) {
                    return true;
                }

                $.alert('Selecione o <strong>bairro</strong> corretamente na lista <br />ou cadastre um novo!');
                return false;
            }

            return true;
        }
    }, {
        key: 'checkFillPlaceIsSuggest',
        value: function checkFillPlaceIsSuggest() {

            var place = $('input[name="place"]').val();

            if (place.length > 0) {

                var place_id = $('input[name="place_id"]').val();

                if (place_id > 0) {
                    return true;
                }

                $.alert('Selecione o <strong>endereço</strong> corretamente na lista <br />ou cadastre um novo!');
                return false;
            }

            return true;
        }
    }]);

    return BaseCompanyController;
}();
//# sourceMappingURL=BaseCompanyController.js.map