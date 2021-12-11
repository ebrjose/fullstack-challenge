<template>
  <header class="max-w-lg mx-auto">
    <a href="#">
      <h1 class="text-4xl font-bold text-white text-center">Talent Board</h1>
    </a>
  </header>

  <main
    class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl"
  >
    <section>
      <h3 class="font-bold text-2xl">Welcome Talent</h3>
      <p class="text-gray-600 pt-2">Don‘t be busy be productive.</p>
    </section>

    <section class="mt-10">
      <form class="flex flex-col" method="POST" @submit.prevent="handleLogin">
        <form-field label="Email">
          <input-field type="email" placeholder="user@example.com" />
        </form-field>

        <form-field label="Password">
          <input-field type="password" placeholder="secret" />
        </form-field>

        <div class="flex justify-end">
          <span
            class="
              text-sm text-purple-600
              hover:text-purple-700 hover:underline
              cursor-pointer
              mb-6
            "
          >
            <router-link :to="{ name: 'Register' }">
              Do you not have an account?
            </router-link>
          </span>
        </div>
        <button-field type="submit">Sign In</button-field>
      </form>
    </section>
  </main>

  <footer class="max-w-lg mx-auto flex justify-center text-white">
    <a href="https://wa.me/59167075727" target="_blank" class="hover:underline">
      Contact
    </a>
    <span class="mx-3">•</span>
    <a
      href="https://www.linkedin.com/in/ebrjose/"
      target="_blank"
      class="hover:underline"
    >
      LinkedIn
    </a>
  </footer>
</template>

<script>
import FormField from '@/components/forms/FormField.vue'
import InputField from '@/components/forms/InputField.vue'
import ButtonField from '@/components/forms/ButtonField.vue'

export default {
  components: {
    FormField,
    InputField,
    ButtonField,
  },
  methods: {
    handleLogin() {
      alert(1)
    },
  },
}
</script>
