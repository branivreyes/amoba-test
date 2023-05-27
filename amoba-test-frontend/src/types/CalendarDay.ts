import type { DayStatus } from './DayStatus'
import type { WeekDay } from './WeekDay'

export default class CalendarDay {
  constructor(
    public day: number,
    public status: DayStatus = 'service',
    public outOfMonth = false,
    public weekDay: WeekDay
  ) {}
}
