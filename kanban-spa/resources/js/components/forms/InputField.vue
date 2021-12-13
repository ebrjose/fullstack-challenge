<template>
  <input
    type="text"
    class="form-input rounded w-full focus:border-purple-600 px-2 pb-2 transition duration-500"
    :value="modelValue"
    :placeholder="placeholder"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input"
  />
</template>
<script>
export default {
  props: ['modelValue', 'placeholder'],

  emits: ['update:modelValue'],

  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
}
</script>
