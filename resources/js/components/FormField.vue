<template>
  <default-field :field="field" :errors="errors">
    <template slot="field">
      <div class="flex flex-col">
        <multiselect
          v-model="value"
          :track-by="this.idColumn"
          :label="label"
          :options="options"
          :max="field.max || null"
          :placeholder="field.placeholder || 'Select option'"
          :close-on-select="false"
          :loading="isLoading"
          :multiple="true"
          @search-change="getOptions"
        />
      </div>
    </template>
  </default-field>
</template>

<script>
import Multiselect from 'vue-multiselect'
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import FieldValues from '../mixins/FieldValues'

export default {
  mixins: [FormField, HandlesValidationErrors, FieldValues],

  props: ['resourceName', 'resourceId', 'field'],

  components: {
    Multiselect
  },

  data() {
    return {
      isLoading: false,
      ajaxTimeout: null
    }
  },

  methods: {
    async setInitialValue() {
      this.setValueFromField()
      await this.setInitialOptions()
    },

    fill(formData) {
      let value = this.value.map(item => {
        return item[this.idColumn]
      })
      formData.append(this.field.attribute, JSON.stringify(value) || [])
    },

    handleChange(value) {
      this.value = value
    },

    getOptions(query) {
      if (query !== '') {
        this.isLoading = true;
        clearTimeout(this.ajaxTimeout);
        this.ajaxTimeout = setTimeout(() => {
          Nova.request().get('/nova-vendor/ajax-multiselect-nova-field/ajax', {
            params: {
              'class': this.field.modelClass,
              'label': this.label,
              'limit': this.field.maxOptions,
              'query': query,
              'custom_query': this.field.queryWhere,
              'orderBy': this.field.orderBy,
              'orderDirection': this.field.orderDirection
            }
          }).then((response) => {
            this.options = response.data;
            this.isLoading = false;
          }).catch((error) => {
            this.isLoading = false;
          })}, 400)
      }
    }
  },
}
</script>
