Nova.booting((Vue, router, store) => {
  Vue.component('index-ajax-multiselect', require('./components/IndexField').default)
  Vue.component('detail-ajax-multiselect', require('./components/DetailField').default)
  Vue.component('form-ajax-multiselect', require('./components/FormField').default)
})
