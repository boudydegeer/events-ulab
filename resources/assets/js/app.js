/**
 * Main Plugins
 */
var Vue = require('vue'),
		VueResource = require('vue-resource');
/**
 * Components
 */
var Form = {
			Ticket : require('./components/Form/Ticket/index.vue'),
			CreditCard : require('./components/Form/CreditCard/index.vue'),
			DiscountCoupon : require('./components/Form/DiscountCoupon/index.vue')
		},
		Tables = {
			PriceTables : require('./components/Tables/PriceTable/index.vue')
		}

/**
 * Vue Config
 */
Vue.config.debug = true;

/**
 * Vue Services
 */
Vue.use(VueResource);

/**
 * Vue instance
 */
new Vue({
	el : 'body',
	events : {
		'stripe::valid' : function (valid) {
			this.isValid = valid
		},
	},
	data : {
		isValid : false,
		coupon : {},
	},
	methods : {
		applyDiscount : function (coupon) {
			this.coupon = coupon
		}
	},
	components : {
		'ticket' : Form.Ticket,
		'credit-card' : Form.CreditCard,
		'discount-coupon' : Form.DiscountCoupon,
		'price-table' : Tables.PriceTables
	},
});