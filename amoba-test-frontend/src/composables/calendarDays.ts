import CalendarDay from '@/types/CalendarDay'
import type { Dayjs } from 'dayjs'
import { computed, type Ref } from 'vue'

export function useCalendarDays(date: Ref<Dayjs>, daysMutator?: (day: CalendarDay) => void) {
  const days = computed(() => {
    const calendarDays: CalendarDay[] = []

    const createCalendarDays = (
      iteration: number,
      getDay: (number: number) => number,
      getWeekDay: (number: number) => number,
      outOfMonth = false
    ) => {
      Array.from({ length: iteration }, (_, number) => {
        const calendarDay = new CalendarDay(
          getDay(number),
          undefined,
          outOfMonth,
          getWeekDay(number)
        )

        daysMutator && daysMutator(calendarDay)

        calendarDays.push(calendarDay)
      })
    }

    const monthStartDay = date.value.startOf('month').day()

    const monthEndDay = date.value.endOf('month').day()

    const lastMonthTotalDays = date.value.subtract(1, 'month').daysInMonth()

    const lastMonthEndDay = monthStartDay - 1

    createCalendarDays(
      monthStartDay,
      (number) => lastMonthTotalDays - (lastMonthEndDay - number),
      (number) => {
        const startWeekDay = lastMonthEndDay - monthStartDay + 1
        return startWeekDay + number
      },
      true
    )

    const daysInMonth = date.value.daysInMonth()

    let currentWeekDay = monthStartDay

    createCalendarDays(
      daysInMonth,
      (number) => number + 1,
      () => {
        if (currentWeekDay === 7) currentWeekDay = 0

        return currentWeekDay++
      }
    )

    createCalendarDays(
      6 - monthEndDay,
      (number) => number + 1,
      (number) => monthEndDay + (number + 1),
      true
    )

    return calendarDays
  })

  return {
    days
  }
}
