<template>
  <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
    {{ task.name }}
    <div class="text-xs text-gray-400 text-right">
      {{ task.deadline }}
    </div>
  </div>
</template>
<script>
export default {
  props: ['task'],
}
</script>
