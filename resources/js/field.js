Nova.booting((Vue, router, store) => {
  Vue.component('index-ajax-multiselect', require('./components/IndexField'))
  Vue.component('detail-ajax-multiselect', require('./components/DetailField'))
  Vue.component('form-ajax-multiselect', require('./components/FormField'))
})
