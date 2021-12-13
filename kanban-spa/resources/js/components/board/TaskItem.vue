<template>
  <div class="bg-white hover:bg-gray-100">
    <form v-if="formVisible" class="bg-gray-300 p-2 rounded mt-2" v-click-outside="hideForm" @submit.prevent="handleSubmit">
      <input-field ref="title" v-model="form.title" type="text" placeholder="Write a title for this task..." class="mb-2" required />
      <input-field v-model="form.deadline" type="date" placeholder="dd/mm/yyyy" class="mb-2" required />
      <button-field class="px-10" type="submit">Save</button-field>
    </form>

    <div v-else class="task-item p-2 rounded mt-1 border-b border-grey cursor-pointer">
      <div class="task-title flex justify-between items-center">
        <span :class="{ 'text-red-400': expired }">{{ task.title }}</span>
        <button class="edit-button px-2 py-1 rounded bg-gray-300 hover:bg-white" @click="showForm"><i class="bi bi-pencil"></i></button>
      </div>
      <div class="text-xs text-gray-500 text-right">
        <span> <i class="bi bi-clock"></i> {{ task.deadline }} </span>
      </div>
    </div>
  </div>
</template>
<script>
import FormField from '@/components/forms/FormField.vue'
import InputField from '@/components/forms/InputField.vue'
import ButtonField from '@/components/forms/ButtonField.vue'

import { mapActions } from 'vuex'

export default {
  components: {
    FormField,
    InputField,
    ButtonField,
  },
  props: ['task'],
  data() {
    return {
      formVisible: false,
      form: {
        task_list_id: this.task.task_list_id,
        title: this.task.title,
        deadline: this.task.deadline,
      },
    }
  },
  computed: {
    expired() {
      if (!this.task.deadline) return false

      const now = new Date()
      const actual = new Date(this.task.deadline)
      return now.getTime() > actual.getTime()
    },
  },
  methods: {
    ...mapActions('task', ['updateTask']),
    async handleSubmit() {
      const payload = {
        taskId: this.task.id,
        resource: this.form,
      }

      const { task } = await this.updateTask(payload)
      this.task.title = task.title
      this.task.deadline = task.deadline
      this.hideForm()
    },
    showForm() {
      this.formVisible = true
      this.focusForm()
    },
    hideForm() {
      this.formVisible = false
    },
    focusForm() {
      setTimeout(() => {
        this.$refs.title.focus()
      }, 100)
    },
  },
}
</script>

<style>
.edit-button {
  display: none;
}
.task-title {
  min-height: 2rem;
}
.task-item:hover .edit-button {
  display: inline-block;
}
</style>
