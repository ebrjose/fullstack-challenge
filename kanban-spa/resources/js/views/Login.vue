<template>
  <header class="max-w-lg mx-auto">
    <a href="#">
      <h1 class="text-4xl font-bold text-white text-center">Talent Board</h1>
    </a>
  </header>

  <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
    <section>
      <h3 class="font-bold text-2xl">Welcome Talent</h3>
      <p class="text-gray-600 pt-2">Don‘t be busy be productive.</p>
    </section>

    <section class="mt-10">
      <form class="flex flex-col" method="POST" @submit.prevent="handleLogin">
        <form-field label="Email">
          <input-field v-model="form.email" type="email" placeholder="user@example.com" required />
        </form-field>

        <form-field label="Password">
          <input-field v-model="form.password" type="password" placeholder="password" required />
        </form-field>

        <div class="flex items-end flex-col">
          <span class="text-sm">Don't have an account?</span>
          <span class="text-sm text-purple-600 hover:text-purple-700 hover:underline cursor-pointer mb-6">
            <router-link :to="{ name: 'Register' }"> Create account </router-link>
          </span>
        </div>
        <button-field type="submit">Sign In</button-field>
      </form>

      <div class="mt-5"><span class="font-bold">Email:</span> user@example.com</div>
      <div><span class="font-bold">Password:</span> password</div>
    </section>
  </main>

  <footer class="max-w-lg mx-auto flex justify-center text-white mt-10">
    <a href="https://wa.me/59167075727" target="_blank" class="hover:underline"> Contact </a>
    <span class="mx-3">•</span>
    <a href="https://www.linkedin.com/in/ebrjose/" target="_blank" class="hover:underline"> LinkedIn </a>
  </footer>
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
  data() {
    return {
      form: { email: '', password: '' },
      redirect: null,
    }
  },
  watch: {
    $route: {
      handler: function (route) {
        const query = route.query
        if (query) {
          this.redirect = query.redirect
        }
      },
      immediate: true,
    },
  },
  methods: {
    ...mapActions('auth', ['login']),
    async handleLogin() {
      const data = await this.login(this.form)
      if (data.user) {
        this.$router.push({ path: this.redirect || '/' })
      }
    },
  },
}
</script>
