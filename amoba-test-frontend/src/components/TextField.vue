<script lang="ts" setup>
import type { Icon } from '@/types/Icon'
import TheIcon from './TheIcon.vue'

withDefaults(
  defineProps<{
    placeholder?: string
    icon?: Icon
    modelValue?: any
    size?: 'default' | 'large'
    label?: string
  }>(),
  {
    size: 'default'
  }
)

const emit = defineEmits<{
  (e: 'update:modelValue', value: any): void
}>()

function onInput(event: Event) {
  const input = event.target as HTMLInputElement

  emit('update:modelValue', input.value)
}
</script>

<template>
  <div
    class="text-field"
    :class="{
      'text-field--large': size === 'large'
    }"
  >
    <label class="text-field__label" v-if="label">{{ label }}</label>

    <div class="text-field__input-container">
      <input
        class="text-field__input"
        :value="modelValue"
        :placeholder="placeholder"
        @input="onInput"
      />

      <TheIcon v-if="icon" class="text-field__icon" :icon="icon" />
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
@use '@/assets/fonts';

$largePadding: 19px;
$defaultPadding: 15px;

.text-field {
  &__label {
    display: block;
    @extend .lato;
    size: 14px;
    font-weight: 700;
    color: colors.$grey;
    padding-left: $defaultPadding;
    margin-bottom: 7px;
  }

  &--large {
    .text-field__label {
      padding-left: $largePadding;
    }

    .text-field__input-container {
      border-radius: 20px;
      height: 49px;
      padding: 6px $largePadding;

      .text-field__icon {
        margin-left: $largePadding;
      }
    }
  }

  &__input-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: colors.$white;
    border-radius: 10px;
    padding: 6px $defaultPadding;

    .text-field__input {
      display: block;
      all: unset;
      flex: 1;
      @extend .lato;
      font-weight: 400;
      font-size: 14px;
      border: none;
      min-width: 0;

      &::placeholder {
        color: colors.$light-grey;
      }
    }

    .text-field__icon {
      margin-left: $defaultPadding;
      background-color: colors.$secondary-text;
    }
  }
}
</style>
