export default {
  data() {
    return {
      options: []
    }
  },

  methods: {
    setValueFromField() {
      this.value = JSON.parse(this.field.value || '')
    },
    async setInitialOptions() {
      if (this.value.length > 0) {
        Nova.request().get('/nova-vendor/ajax-multiselect-nova-field/ajax/options', {
          params: {
            'class': this.field.modelClass,
            'label': this.label,
            'value': this.field.value
          }
        }).then(response => {
          this.options = response.data
          this.value = response.data
        })
      }
    }
  },

  computed: {
    idColumn() {
      return this.field.modelIdColumn || 'id'
    },
    label() {
      return this.field.searchLabel || 'name'
    }
  }
}
