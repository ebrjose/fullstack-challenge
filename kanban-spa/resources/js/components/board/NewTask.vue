<template>
  <form v-if="formVisible" class="bg-gray-300 p-2 rounded mt-2" v-click-outside="hideForm" @submit.prevent="handleSubmit">
    <input-field ref="title" v-model="form.title" type="text" placeholder="Write a title for this task..." class="mb-2" required />
    <!-- <input-field v-model="form.deadline" type="date" placeholder="dd/mm/yyyy" class="mb-2" /> -->
    <button-field class="px-10" type="submit">Save</button-field>
  </form>

  <button v-else class="w-full hover:bg-gray-300 text-grey-dark p-2 mt-1 text-left rounded cursor-pointer" @click="showForm">
    <i class="bi bi-plus-lg mr-1"></i>
    <span>Add a task...</span>
  </button>
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
  props: ['taskListId'],
  data() {
    return {
      formVisible: false,
      form: {
        task_list_id: this.taskListId,
        title: '',
        deadline: null,
      },
    }
  },
  methods: {
    ...mapActions('task', ['saveTask']),
    async handleSubmit() {
      if (this.form.title.trim() === '') {
        return this.$refs.title.select()
      }
      const { task } = await this.saveTask(this.form)
      this.emitter.emit('add-item-task-list', { taskListId: this.taskListId, task })
      this.resetForm()
    },
    showForm() {
      this.formVisible = true
      this.resetForm()
    },
    hideForm() {
      this.formVisible = false
    },
    resetForm() {
      this.form.title = ''
      this.form.deadline = null
      setTimeout(() => {
        this.$refs.title.focus()
      }, 100)
    },
  },
}
</script>
