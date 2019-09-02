'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListCityController = function () {
	function ListCityController() {
		_classCallCheck(this, ListCityController);

		this.service = new ListCityService();
	}

	_createClass(ListCityController, [{
		key: 'init',
		value: function init() {

			$('#toggle-one').bootstrapToggle();

			$(function () {

				this.service.registerCity('#register');

				this.service.editCity('#edit');
				this.service.updateStatus('.jq_status_city');
				this.service.removeCity('.jq_remove_city');

				/*Loading*/
				$('#loading').hide();
				$('#sample_1').removeClass('hide');
			}.bind(this));
		}
	}], [{
		key: 'setDataModalEdit',
		value: function setDataModalEdit(id, name) {
			$('#edit-city-id').val(id);
			$('#edit-city-name').val(name);
		}
	}]);

	return ListCityController;
}();
//# sourceMappingURL=ListCityController.js.map