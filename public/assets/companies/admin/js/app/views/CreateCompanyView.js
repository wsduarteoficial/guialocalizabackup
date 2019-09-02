"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _get = function get(object, property, receiver) { if (object === null) object = Function.prototype; var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ("value" in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var CreateCompanyView = function (_BaseCompanyView) {
	_inherits(CreateCompanyView, _BaseCompanyView);

	function CreateCompanyView() {
		_classCallCheck(this, CreateCompanyView);

		return _possibleConstructorReturn(this, (CreateCompanyView.__proto__ || Object.getPrototypeOf(CreateCompanyView)).apply(this, arguments));
	}

	_createClass(CreateCompanyView, [{
		key: "selectPlan",
		value: function selectPlan() {
			_get(CreateCompanyView.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyView.prototype), "selectPlan", this).call(this);
		}
	}, {
		key: "addInputPhoneFixed",
		value: function addInputPhoneFixed(el) {
			_get(CreateCompanyView.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyView.prototype), "addInputPhoneFixed", this).call(this, el);
		}
	}, {
		key: "addInputPhoneCell",
		value: function addInputPhoneCell(el) {
			_get(CreateCompanyView.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyView.prototype), "addInputPhoneCell", this).call(this, el);
		}
	}, {
		key: "addInputPhoneOthers",
		value: function addInputPhoneOthers(el) {
			_get(CreateCompanyView.prototype.__proto__ || Object.getPrototypeOf(CreateCompanyView.prototype), "addInputPhoneOthers", this).call(this, el);
		}
	}]);

	return CreateCompanyView;
}(BaseCompanyView);
//# sourceMappingURL=CreateCompanyView.js.map