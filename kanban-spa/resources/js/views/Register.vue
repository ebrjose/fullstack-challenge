<template>
  <header class="max-w-lg mx-auto">
    <a href="#">
      <h1 class="text-4xl font-bold text-white text-center">Talent Board</h1>
    </a>
  </header>

  <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
      <h3 class="font-bold text-2xl">Register Form</h3>
      <p class="text-gray-600 pt-2">Don‘t be busy be productive.</p>
    </section>

    <section class="mt-10">
      <form class="flex flex-col" method="POST" @submit.prevent="handleRegister">
        <form-field label="Name">
          <input-field v-model="form.name" type="text" placeholder="John Doe" />
        </form-field>

        <form-field label="Email">
          <input-field v-model="form.email" type="email" placeholder="jdoe@example.com" />
        </form-field>

        <form-field label="Password">
          <input-field v-model="form.password" type="password" placeholder="secret" />
        </form-field>

        <form-field label="Password Confirmation">
          <input-field v-model="form.password_confirmation" type="password" placeholder="secret" />
        </form-field>

        <div class="flex items-end flex-col">
          <span class="text-sm">Already have an account?</span>
          <span class="text-sm text-purple-600 hover:text-purple-700 hover:underline cursor-pointer mb-6">
            <router-link :to="{ name: 'Login' }"> Sign In </router-link>
          </span>
        </div>
        <button-field type="submit">Sign Up</button-field>
      </form>
    </section>
  </main>

  <footer class="max-w-lg mx-auto flex justify-center text-white">
    <a href="https://wa.me/59167075727" target="_blank" class="hover:underline"> Contact </a>
    <span class="mx-3">•</span>
    <a href="https://www.linkedin.com/in/ebrjose/" target="_blank" class="hover:underline"> LinkedIn </a>
  </footer>
</template>

<script>
import FormField from '@/components/forms/FormField.vue'
import InputField from '@/components/forms/InputField.vue'
import ButtonField from '@/components/forms/ButtonField.vue'

import { register } from '@/api/auth'

export default {
  components: {
    FormField,
    InputField,
    ButtonField,
  },
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
    }
  },
  methods: {
    async handleRegister() {
      const { data } = await register(this.form)
      console.log('handleRegister -> data', data)
    },
  },
}
</script>
