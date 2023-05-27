<script lang="ts" setup>
import { computed, toRefs } from 'vue'
import TheIcon from '../TheIcon.vue'
import CalendarDayComponent from './CalendarDay.vue'
import type { DayStatus } from '@/types/DayStatus'
import dayjs, { Dayjs } from 'dayjs'
import 'dayjs/locale/es'
import { useCalendarDays } from '@/composables/calendarDays'
import { WeekDay } from '@/types/WeekDay'
import type CalendarDay from '@/types/CalendarDay'

dayjs.locale('es')

const props = defineProps<{
  modelValue: Dayjs
  disabledWeekDays?: WeekDay[]
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: Dayjs): void
}>()

const { modelValue: selectedDate } = toRefs(props)

const keyedDisabledWeekDays = computed(() => {
  return (
    props.disabledWeekDays?.reduce<{ [key: number]: boolean }>((prev, current) => {
      prev[current] = true
      return prev
    }, {}) || {}
  )
})

const { days } = useCalendarDays(selectedDate, calendarDaysMutator)

const weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

const headerMonth = computed(() => {
  const selectedMonth = selectedDate.value.format('MMMM')
  const selectedYear = selectedDate.value.format('YYYY')

  return `${selectedMonth} ${selectedYear}`
})

function calendarDaysMutator(calendarDay: CalendarDay) {
  if (keyedDisabledWeekDays.value[calendarDay.weekDay]) calendarDay.status = 'out-of-frecuency'
}

function goMonthBack() {
  emit('update:modelValue', selectedDate.value.subtract(1, 'month'))
}

function goMonthForward() {
  emit('update:modelValue', selectedDate.value.add(1, 'month'))
}
</script>

<template>
  <div class="calendar">
    <div class="calendar__header">
      <h2 class="calendar__header__month">{{ headerMonth }}</h2>

      <div class="calendar__header__buttons">
        <TheIcon
          class="calendar__header__buttons__button"
          icon="chevron-left"
          @click="goMonthBack"
        />

        <TheIcon
          class="calendar__header__buttons__button"
          icon="chevron-right"
          @click="goMonthForward"
        />
      </div>
    </div>

    <div class="calendar__days-container">
      <div v-for="(weekDay, index) in weekDays" :key="index" class="calendar__week-day">
        {{ weekDay }}
      </div>

      <CalendarDayComponent
        v-for="(day, index) in days"
        :key="index"
        :day="day.day"
        :status="day.status"
        :out-of-month="day.outOfMonth"
      />
    </div>
  </div>
</template>

<style lang="scss" scoped>
@use '@/assets/colors';
@use '@/assets/fonts';

.calendar {
  background-color: colors.$white;
  border-radius: 20px;
  padding: 30px 40px;

  &__header {
    display: flex;
    justify-content: space-between;
    align-items: center;

    &__month {
      font-weight: 700;
      font-size: 24px;
      text-transform: capitalize;
    }

    &__buttons {
      display: flex;
      justify-content: space-between;
      align-items: center;

      &__button {
        background-color: colors.$black;
        cursor: pointer;

        &:nth-child(2) {
          margin-left: 22px;
          margin-right: 15px;
        }
      }
    }
  }

  &__days-container {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    padding-top: 17px;
  }

  &__week-day {
    display: flex;
    align-items: center;
    justify-content: center;
    @extend .lato;
    font-weight: 600;
    font-size: 12px;
    height: 20px;
    margin: 10px;
    color: colors.$black;
  }
}
</style>
