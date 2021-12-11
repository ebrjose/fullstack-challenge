<template>
  <div class="mb-6 pt-3 rounded">
    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3">
      {{ label }}
    </label>
    <slot />
  </div>
</template>
<script>
export default {
  props: ['label'],
}
</script>
