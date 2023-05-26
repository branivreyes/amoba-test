<script lang="ts" setup>
import { RouterLink } from 'vue-router'
import TheIcon from './TheIcon.vue'
import type { Icon } from '@/types/Icon'
defineProps<{
  to: string
  title: string
  icon: Icon
}>()
</script>

<template>
  <RouterLink :to="{ name: to }" class="nav-bar-option">
    <TheIcon class="nav-bar-option__icon" :icon="icon" />

    <span class="nav-bar-option__title">
      {{ title }}
    </span>
  </RouterLink>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
.nav-bar-option {
  display: flex;
  align-items: center;
  text-decoration: none;

  &.router-link-active {
    .nav-bar-option__title {
      font-weight: 700;
    }
  }

  &__icon {
    background-color: colors.$white;
  }

  &__title {
    color: colors.$white;
    margin-left: 20px;
    font-size: 18px;
  }
}
</style>
