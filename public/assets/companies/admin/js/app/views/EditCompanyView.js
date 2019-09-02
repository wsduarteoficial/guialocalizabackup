"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var EditCompanyView = function (_BaseCompanyView) {
	_inherits(EditCompanyView, _BaseCompanyView);

	function EditCompanyView() {
		_classCallCheck(this, EditCompanyView);

		return _possibleConstructorReturn(this, (EditCompanyView.__proto__ || Object.getPrototypeOf(EditCompanyView)).apply(this, arguments));
	}

	_createClass(EditCompanyView, [{
		key: "selectPlan",
		value: function selectPlan() {
			_get(EditCompanyView.prototype.__proto__ || Object.getPrototypeOf(EditCompanyView.prototype), "selectPlan", this).call(this);
		}
	}, {
		key: "addInputPhoneFixed",
		value: function addInputPhoneFixed(el) {
			_get(EditCompanyView.prototype.__proto__ || Object.getPrototypeOf(EditCompanyView.prototype), "addInputPhoneFixed", this).call(this, el);
		}
	}, {
		key: "addInputPhoneCell",
		value: function addInputPhoneCell(el) {
			_get(EditCompanyView.prototype.__proto__ || Object.getPrototypeOf(EditCompanyView.prototype), "addInputPhoneCell", this).call(this, el);
		}
	}, {
		key: "addInputPhoneOthers",
		value: function addInputPhoneOthers(el) {
			_get(EditCompanyView.prototype.__proto__ || Object.getPrototypeOf(EditCompanyView.prototype), "addInputPhoneOthers", this).call(this, el);
		}
	}]);

	return EditCompanyView;
}(BaseCompanyView);
//# sourceMappingURL=EditCompanyView.js.map