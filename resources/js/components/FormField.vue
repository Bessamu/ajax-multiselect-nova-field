<template>
  <default-field :field="field" :errors="errors">
    <template slot="field">
      <div class="flex flex-col">
        <multiselect
          label="label"
          track-by="value"
          :id="field.name"
          :value="value"
          :options="ajaxOptions"
          :max="field.max"
          :loading="isLoading"
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
    /*
     * Set the initial, internal value for the field.
     */
     setInitialValue() {
      this.setInitialOptions()
      console.log(2)
      this.value = this.field.value
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || '')
    },

    /**
     * Update the field's internal value.
     */
    handleChange(value) {
      this.value = value
    },

    getOptions(query) {
      if (query !== '') {
        this.isLoading = true;
        clearTimeout(this.ajaxTimeout);
        this.ajaxTimeout = setTimeout(() => {
          Nova.request().get('/nova-vendor/nova-multiselect-field/ajax', {
            params: {
              'class': this.field.modelClass,
              'label': this.field.searchLabel,
              'limit': this.field.maxOptions,
              'query': query
            }
          }).then((response) => {
            this.ajaxOptions = response.data;
            this.isLoading = false;
          }).catch((error) => {
            this.isLoading = false;
          })}, 400)
      }
    }
  },
}
</script>
