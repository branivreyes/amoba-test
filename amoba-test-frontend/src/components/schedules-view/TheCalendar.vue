<script lang="ts" setup>
import { computed, ref } from 'vue'
import TheIcon from '../TheIcon.vue'
import CalendarDayComponent from './CalendarDay.vue'
import CalendarDay from '@/types/CalendarDay'
import type { DayStatus } from '@/types/DayStatus'
import dayjs from 'dayjs'
import 'dayjs/locale/es'

dayjs.locale('es')

const selectedDate = ref(dayjs())

const days = ref<CalendarDay[]>([])

const monthStartDay = computed(() => selectedDate.value.startOf('month').day())

const monthEndDay = computed(() => selectedDate.value.endOf('month').day())

const lastMonthTotalDays = computed(() => selectedDate.value.subtract(1, 'month').daysInMonth())

const lastMonthEndDay = computed(() => monthStartDay.value - 1)

Array.from({ length: monthStartDay.value }, (_, number) => {
  days.value.push(
    new CalendarDay(lastMonthTotalDays.value - (lastMonthEndDay.value - number), 'out-of-month')
  )
})

const daysInMonth = ref(selectedDate.value.daysInMonth())

const dummyStatus: DayStatus[] = []

dummyStatus[6] = 'disabled'
dummyStatus[11] = 'route-full-capacity'
dummyStatus[12] = 'booked'
dummyStatus[18] = 'out-of-frecuency'

Array.from({ length: daysInMonth.value }, (_, number) =>
  days.value.push(new CalendarDay(number + 1, dummyStatus[number]))
)

Array.from({ length: 6 - monthEndDay.value }, (_, number) =>
  days.value.push(new CalendarDay(number + 1, 'out-of-month'))
)

const weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

const headerMonth = computed(() => {
  const selectedMonth = selectedDate.value.format('MMMM')
  const selectedYear = selectedDate.value.format('YYYY')

  return `${selectedMonth} ${selectedYear}`
})
</script>

<template>
  <div class="calendar">
    <div class="calendar__header">
      <h2 class="calendar__header__month">{{ headerMonth }}</h2>

      <div class="calendar__header__buttons">
        <TheIcon class="calendar__header__buttons__button" icon="chevron-left" />

        <TheIcon class="calendar__header__buttons__button" icon="chevron-right" />
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
