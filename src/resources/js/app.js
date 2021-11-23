require('./bootstrap');
import Vue from 'vue';
import _ from 'lodash';
import { createInertiaApp } from '@inertiajs/inertia-vue';
import VueLang from '@eli5/vue-lang-js'
import translations from './vue-translations.js';
import store from './store';

Vue.use(VueLang, {
  messages: translations,
  locale: 'en',
  fallback: 'en'
});


createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, App, props }) {
    new Vue({
      store: store,
      render: h => h(App, props),
    }).$mount(el)
  },
})

Vue.filter('formatDate', function(value) {
  var date = new Date(value);

  return (
    "" +
    date.getFullYear() +
    "/" +
    (date.getMonth() + 1 > 9 ? "" : "0") +
    (date.getMonth() + 1) +
    "/" +
    (date.getDate() > 9 ? "" : "0") +
    date.getDate()
  );
});