<template>
  <div class="bg-white p-2 rounded mt-1 border-b border-grey cursor-pointer hover:bg-grey-lighter">
    {{ task.title }}
    <div class="text-xs text-gray-500 text-right">
      <span> <i class="bi bi-clock"></i> {{ task.deadline }} </span>
    </div>
  </div>
</template>
<script>
export default {
  props: ['task'],
}
</script>
