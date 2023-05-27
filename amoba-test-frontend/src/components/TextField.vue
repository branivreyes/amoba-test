<script lang="ts" setup>
import type { Icon } from '@/types/Icon'
import TheIcon from './TheIcon.vue'
import { computed, ref } from 'vue'
import dayjs from 'dayjs'

const dateInput = ref<HTMLInputElement | null>(null)

const props = withDefaults(
  defineProps<{
    placeholder?: string
    icon?: Icon
    modelValue?: any
    size?: 'default' | 'large'
    label?: string
    type?: string
  }>(),
  {
    size: 'default'
  }
)

const emit = defineEmits<{
  (e: 'update:modelValue', value: any): void
}>()

const isDateInput = computed(() => props.type === 'date')

const inputEvents = computed(() => {
  if (isDateInput.value)
    return {
      onfocus: showDatePicker,
      onclick: showDatePicker
    }

  return {}
})

const sharedEvents = computed(() => {
  if (isDateInput.value)
    return {
      onclick: showDatePicker
    }

  return {}
})

function onInput(event: Event) {
  const input = event.target as HTMLInputElement

  emit('update:modelValue', input.value)
}

function onDateInput(event: Event) {
  const input = event.target as HTMLInputElement

  emit('update:modelValue', dayjs(input.value))
}

function showDatePicker(event: MouseEvent) {
  event.stopPropagation()

  try {
    dateInput.value?.showPicker()
  } catch {} // eslint-disable-line
}
</script>

<template>
  <div
    v-bind="sharedEvents"
    class="text-field"
    :class="{
      'text-field--large': size === 'large',
      'text-field--is-date': isDateInput
    }"
  >
    <label class="text-field__label" v-if="label">{{ label }}</label>

    <div class="text-field__input-container">
      <input
        v-bind="inputEvents"
        class="text-field__input"
        :value="modelValue"
        :placeholder="placeholder"
        :readonly="isDateInput"
        @input="onInput"
      />

      <input ref="dateInput" class="text-field__date-input" type="date" @input="onDateInput" />

      <TheIcon v-if="icon" class="text-field__icon" :icon="icon" v-bind="sharedEvents" />
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
@use '@/assets/fonts';

$largePadding: 19px;
$defaultPadding: 15px;

.text-field {
  position: relative;
  z-index: 1;

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
      position: relative;
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
    @extend .lato;

    .text-field__input {
      display: block;
      all: unset;
      flex: 1;
      font-weight: 700;
      font-size: 14px;
      border: none;
      min-width: 0;
      color: colors.$grey;

      &::placeholder {
        color: colors.$light-grey;
        font-weight: 400;
      }
    }

    .text-field__date-input {
      position: absolute;
      z-index: -1;
      bottom: 0;
      visibility: hidden;
    }

    .text-field__icon {
      margin-left: $defaultPadding;
      background-color: colors.$secondary-text;
    }
  }

  &--is-date {
    cursor: pointer;

    .text-field__icon {
      margin-left: 0 !important;
    }
  }
}
</style>
