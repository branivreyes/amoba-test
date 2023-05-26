import type { DayStatus } from './DayStatus'

export default class CalendarDay {
  constructor(public day: number, public status: DayStatus = 'service') {
    this.day = day
    this.status = status
  }
}
