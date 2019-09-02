'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListZipcodeController = function () {
	function ListZipcodeController() {
		_classCallCheck(this, ListZipcodeController);

		this.service = new ListZipcodeService();
	}

	_createClass(ListZipcodeController, [{
		key: 'init',
		value: function init() {

			$('#toggle-one').bootstrapToggle();

			$(function () {

				this.service.registerZipcode('#register');
				this.service.editZipcode('#edit');
				this.service.updateStatus('.jq_status_zipcode');
				this.service.removeZipcode('.jq_remove_zipcode');

				/*Loading*/
				$('#loading').hide();
				$('#sample_1').removeClass('hide');
			}.bind(this));
		}
	}], [{
		key: 'setDataModalEdit',
		value: function setDataModalEdit(id, name) {
			$('#edit-zipcode-id').val(id);
			$('#edit-zipcode-name').val(name);
		}
	}]);

	return ListZipcodeController;
}();
//# sourceMappingURL=ListZipcodeController.js.map