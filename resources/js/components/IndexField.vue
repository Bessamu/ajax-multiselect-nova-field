<template>
  <span>{{ value.length || '—' }}</span>
</template>

<script>
import FieldValues from '../mixins/FieldValues'

export default {
  mixins: [FieldValues],

  props: ['resourceName', 'field'],

  data() {
    return {
      value: {}
    }
  },
  beforeMount() {
    this.setValueFromField()
  }
}
</script>
