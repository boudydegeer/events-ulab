/**
 * Main Plugins
 */
var Vue = require('vue');

/**
 * Components
 */
var FormTicket = require('./components/Form/Ticket/index.vue')

/**
 * Vue Config
 */
Vue.config.debug = true;

/**
 * Vue instance
 */
new Vue({
	el : 'body',
	data : {
		message : "My message"
	},
	components : {
		'ticket' : FormTicket
	}
});