<script setup lang="ts">
import { RouterView } from 'vue-router'
import NavBar from '@/components/NavBar.vue'
import TheHeader from '@/components/TheHeader.vue'

import { useHeaderTitle } from './composables/headerTitle'

const { title: headerTitle } = useHeaderTitle()
</script>

<template>
  <main class="main">
    <NavBar />

    <section class="container">
      <TheHeader :title="headerTitle" />

      <div class="content">
        <RouterView />
      </div>
    </section>
  </main>
</template>

<style scoped lang="scss">
@use '@/assets/colors';
.main {
  width: 100%;
  height: 100%;
  padding: 40px;
  background-color: colors.$background-color;
  display: grid;
  grid-template-columns: auto 1fr;

  .container {
    padding: 0 60px;
  }

  .content {
    margin-top: 28px;
  }
}
</style>
