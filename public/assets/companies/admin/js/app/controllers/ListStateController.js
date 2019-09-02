'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var ListStateController = function () {
	function ListStateController() {
		_classCallCheck(this, ListStateController);

		this.service = new ListStateService();
	}

	_createClass(ListStateController, [{
		key: 'init',
		value: function init() {

			$('#toggle-one').bootstrapToggle();

			$(function () {
				this.service.updateStatus('.jq_status_state');

				/*Loading*/
				$('#loading').hide();
				$('#sample_1').removeClass('hide');
			}.bind(this));
		}
	}]);

	return ListStateController;
}();
//# sourceMappingURL=ListStateController.js.map