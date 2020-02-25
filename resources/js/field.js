Nova.booting((Vue, router, store) => {
  Vue.component('index-ajax-multiselect-field', require('./components/IndexField'))
  Vue.component('detail-ajax-multiselect-field', require('./components/DetailField'))
  Vue.component('form-ajax-multiselect-field', require('./components/FormField'))
})
