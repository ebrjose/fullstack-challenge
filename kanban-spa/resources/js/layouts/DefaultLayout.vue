<template>
  <h1>
    <router-link :to="{ name: 'Login' }">Login</router-link> |
    <router-link :to="{ name: 'Register' }">Register</router-link> |
    <router-link :to="{ name: 'Dashboard' }">Dashboard</router-link>
  </h1>
  <br />
  <slot></slot>
  <h3>FOOTER</h3>
</template>
