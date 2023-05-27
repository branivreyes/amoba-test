<script lang="ts" setup>
import TheIcon from '@/components/TheIcon.vue'

defineProps<{
  text?: string
}>()
</script>

<template>
  <div class="loading">
    <TheIcon class="loading__icon" icon="loading" />
    <span class="loading__text" v-if="text">{{ text }}</span>
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';

$color: colors.$grey;

.loading {
  display: flex;
  align-items: center;
  flex-direction: column;

  &__icon {
    width: 40px;
    height: 40px;
    background-color: $color;
    animation: spinning infinite 500ms linear;
  }

  &__text {
    margin-top: 10px;
    color: $color;
    font-size: 14px;
  }
}

@keyframes spinning {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}
</style>
