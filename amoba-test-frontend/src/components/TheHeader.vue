<script lang="ts" setup>
import TheIcon from './TheIcon.vue'
import TextField from './TextField.vue'

defineProps<{
  title: string
}>()
</script>

<template>
  <header class="header">
    <h1 class="header__title">{{ title }}</h1>

    <div class="header__tools">
      <TextField class="header__tools__search-input" placeholder="Search..." icon="search" />

      <TheIcon class="header__tools__notification" icon="notification" />

      <img class="header__tools__user-picture" src="/image1.png" alt="user-picture" />
    </div>
  </header>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 20px;

  &__title {
    font-weight: 700;
    font-size: 24px;
  }

  &__tools {
    display: flex;
    align-items: center;

    &__search-input {
      width: 180px;
    }

    &__notification {
      width: 18px;
      height: 20px;
      background-color: colors.$black;
      margin-left: 30px;
    }

    &__user-picture {
      margin-left: 30px;
      border-radius: 50%;
    }
  }
}
</style>
