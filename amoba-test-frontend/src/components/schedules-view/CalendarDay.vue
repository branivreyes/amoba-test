<script lang="ts" setup>
import type { DayStatus } from '@/types/DayStatus'

withDefaults(
  defineProps<{
    day: number
    status?: DayStatus
    outOfMonth?: boolean
  }>(),
  {
    status: 'service'
  }
)
</script>

<template>
  <div
    class="calendar-day"
    :class="{
      ['calendar-day--' + status]: true,
      ['calendar-day--out-of-month']: outOfMonth
    }"
  >
    {{ day }}
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
@use '@/assets/fonts';

.calendar-day {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 80px;
  @extend .lato;
  font-size: 16px;
  font-weight: 400;
  color: colors.$black;
  border-radius: 30px;

  &--disabled {
    background-color: colors.$disabled-day;
  }

  &--route-full-capacity {
    background-color: colors.$route-full-capacity;
  }

  &--booked {
    background-color: colors.$booked-day;
    color: colors.$white;
  }

  &--out-of-frecuency {
    background-color: colors.$out-of-frecuency;
    color: colors.$white;
  }

  &--out-of-month {
    color: colors.$out-of-month;
  }
}
</style>
