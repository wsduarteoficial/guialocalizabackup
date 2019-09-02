'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListDistrictController = function () {
	function ListDistrictController() {
		_classCallCheck(this, ListDistrictController);

		this.service = new ListDistrictService();
	}

	_createClass(ListDistrictController, [{
		key: 'init',
		value: function init() {

			$('#toggle-one').bootstrapToggle();

			$(function () {

				this.service.registerDistrict('#register');

				this.service.editDistrict('#edit');
				this.service.updateStatus('.jq_status_district');
				this.service.removeDistrict('.jq_remove_district');

				/*Loading*/
				$('#loading').hide();
				$('#sample_1').removeClass('hide');
			}.bind(this));
		}
	}], [{
		key: 'setDataModalEdit',
		value: function setDataModalEdit(id, name) {
			$('#edit-district-id').val(id);
			$('#edit-district-name').val(name);
		}
	}]);

	return ListDistrictController;
}();
//# sourceMappingURL=ListDistrictController.js.map