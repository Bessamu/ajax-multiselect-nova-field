export default {
  data() {
    return {
      ajaxOptions: null
    }
  },

  methods: {
    setInitialOptions: async() => {
      return Nova.request().get('/nova-vendor/nova-multiselect-field/ajax/options', {
        params: {
          'class': this.field.ajaxClass,
          'label': this.field.ajaxLabel,
          'value': this.field.value,
          'withValue': withValue
        }
      }).then(response => {
        console.log(1)
        this.ajaxOptions = response.data
      })
    }
  }
}
