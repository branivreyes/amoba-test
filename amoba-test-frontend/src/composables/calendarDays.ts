import CalendarDay from '@/types/CalendarDay'
import type { Dayjs } from 'dayjs'
import { computed, type Ref } from 'vue'

export function useCalendarDays(date: Ref<Dayjs>, daysMutator?: (day: CalendarDay) => void) {
  const days = computed(() => {
    const calendarDays: CalendarDay[] = []

    const monthStartDay = date.value.startOf('month').day()

    const monthEndDay = date.value.endOf('month').day()

    const lastMonthTotalDays = date.value.subtract(1, 'month').daysInMonth()

    const lastMonthEndDay = monthStartDay - 1

    Array.from({ length: monthStartDay }, (_, number) => {
      const startWeekDay = lastMonthEndDay - monthStartDay + 1
      const weekDay = startWeekDay + number

      const calendarDay = new CalendarDay(
        lastMonthTotalDays - (lastMonthEndDay - number),
        undefined,
        true,
        weekDay
      )

      daysMutator && daysMutator(calendarDay)

      calendarDays.push(calendarDay)
    })

    const daysInMonth = date.value.daysInMonth()

    let currentWeekDay = monthStartDay

    Array.from({ length: daysInMonth }, (_, number) => {
      if (currentWeekDay === 7) currentWeekDay = 0

      const calendarDay = new CalendarDay(number + 1, undefined, false, currentWeekDay)

      daysMutator && daysMutator(calendarDay)

      calendarDays.push(calendarDay)

      currentWeekDay += 1
    })

    Array.from({ length: 6 - monthEndDay }, (_, number) => {
      const weekDay = monthEndDay + (number + 1)

      const calendarDay = new CalendarDay(number + 1, undefined, true, weekDay)

      daysMutator && daysMutator(calendarDay)

      calendarDays.push(calendarDay)
    })

    return calendarDays
  })

  return {
    days
  }
}
