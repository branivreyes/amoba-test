<script lang="ts" setup>
import type { Icon } from '@/types/Icon'
import NavBarOption from './NavBarOption.vue'

const options: { to: string; title: string; icon: Icon }[] = [
  {
    to: 'dashboard',
    title: 'Dashboard',
    icon: 'dashboard'
  },
  {
    to: 'transactions',
    title: 'Transactions',
    icon: 'transaction'
  },
  {
    to: 'schedules',
    title: 'Schedules',
    icon: 'schedule'
  },
  {
    to: 'users',
    title: 'Users',
    icon: 'user'
  },
  {
    to: 'settings',
    title: 'Settings',
    icon: 'setting'
  }
]
</script>

<template>
  <nav class="nav-bar">
    <div class="nav-bar__options-container">
      <NavBarOption
        v-for="(option, index) in options"
        class="nav-bar__option"
        :key="index"
        :to="option.to"
        :title="option.title"
        :icon="option.icon"
      />
    </div>

    <div class="nav-bar__footer">
      <span>Help</span>
      <span>Contact Us</span>
    </div>
  </nav>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
.nav-bar {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 280px;
  height: 100%;
  padding-left: 50px;
  padding-top: 166px;
  background-color: colors.$primary;
  border-radius: 30px;

  &__option {
    margin-top: 50px;

    &:first-of-type {
      margin-top: 0;
    }
  }

  &__footer {
    display: flex;
    flex-direction: column;
    gap: 20px;
    color: colors.$white;
    font-size: 14px;
    font-weight: 400;
    padding-bottom: 60px;
  }
}
</style>
