<template>
  <div class="flex border-b border-40" v-if="value">
    <div class="w-1/4 py-4"><h4 class="font-normal text-80">{{ field.name }}</h4></div>
    <div class="w-3/4 py-4 break-words">
      <div :class="{'my-2': i > 0, 'mb-2': i === 0}" v-for="(item, i) of value" :key="i" v-if="i < 5">
        {{ item[label] }}
      </div>
      <div v-if="value.length > 5">
        <div class="my-2 ajax-multiselect__show-more" @click="show = !show" v-if="!show">Show more ...</div>
        <div v-if="show">
          <div class="my-2" v-for="(item, i) of value" :key="i" v-if="i > 4">
            {{ item[label] }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div v-else>—</div>
</template>

<script>
import FieldValues from '../mixins/FieldValues'

export default {
  mixins: [FieldValues],

  props: ['resource', 'resourceName', 'resourceId', 'field'],

  data() {
    return {
      value: {},
      show: false
    }
  },
  beforeMount() {
    this.setValueFromField()
    this.setInitialOptions()
  }
}
</script>
