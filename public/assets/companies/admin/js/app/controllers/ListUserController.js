'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListUserController = function () {
	function ListUserController() {
		_classCallCheck(this, ListUserController);

		this.service = new ListUserService();
	}

	_createClass(ListUserController, [{
		key: 'init',
		value: function init() {

			$('#toggle-one').bootstrapToggle();

			$(function () {

				this.service.updateStatus('.jq_status_user');
				this.service.removeUser('.jq_remove_user');

				/*Loading*/
				$('#loading').hide();
				$('#sample_1').removeClass('hide');
			}.bind(this));
		}
	}]);

	return ListUserController;
}();
//# sourceMappingURL=ListUserController.js.map