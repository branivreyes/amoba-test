<script lang="ts" setup>
import type { Icon } from '@/types/Icon'

defineProps<{
  icon: Icon
}>()
</script>

<template>
  <i class="icon" :class="icon"></i>
</template>

<style lang="scss" scoped>
@use '@/assets/icons';

.icon {
  @extend .icon;
}
</style>
