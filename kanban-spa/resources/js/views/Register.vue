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
      <h3 class="font-bold text-2xl">Register Form</h3>
      <p class="text-gray-600 pt-2">Don‘t be busy be productive.</p>
    </section>

    <section class="mt-10">
      <form class="flex flex-col" method="POST" action="#">
        <div class="mb-6 pt-3 rounded">
          <label
            class="block text-gray-700 text-sm font-bold mb-2 ml-3"
            for="email"
          >
            Email
          </label>
          <input
            type="text"
            id="email"
            class="
              bg-gray-100
              rounded
              w-full
              text-gray-700
              focus:outline-none
              border-b-4 border-gray-300
              focus:border-purple-600
              transition
              duration-500
              px-3
              pb-3
            "
          />
        </div>
        <div class="mb-6 pt-3 rounded">
          <label
            class="block text-gray-700 text-sm font-bold mb-2 ml-3"
            for="password"
          >
            Password
          </label>
          <input
            type="password"
            id="password"
            class="
              bg-gray-100
              rounded
              w-full
              text-gray-700
              focus:outline-none
              border-b-4 border-gray-300
              focus:border-purple-600
              transition
              duration-500
              px-3
              pb-3
            "
          />
        </div>
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
        <button
          class="
            bg-purple-600
            hover:bg-purple-700
            text-white
            font-bold
            py-2
            rounded
            shadow-lg
            hover:shadow-xl
            transition
            duration-200
          "
          type="submit"
        >
          Sign In
        </button>
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
