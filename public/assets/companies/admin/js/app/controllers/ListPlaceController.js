'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListPlaceController = function () {
	function ListPlaceController() {
		_classCallCheck(this, ListPlaceController);

		this.service = new ListPlaceService();
	}

	_createClass(ListPlaceController, [{
		key: 'init',
		value: function init() {

			$('#toggle-one').bootstrapToggle();

			$(function () {

				this.service.registerPlace('#register');
				this.service.editPlace('#edit');
				this.service.updateStatus('.jq_status_place');
				this.service.removePlace('.jq_remove_place');

				/*Loading*/
				$('#loading').hide();
				$('#sample_1').removeClass('hide');
			}.bind(this));
		}
	}], [{
		key: 'setDataModalEdit',
		value: function setDataModalEdit(id, name) {
			$('#edit-place-id').val(id);
			$('#edit-place-name').val(name);
		}
	}]);

	return ListPlaceController;
}();
//# sourceMappingURL=ListPlaceController.js.map