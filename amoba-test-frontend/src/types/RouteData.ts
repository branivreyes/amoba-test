import type { WeekDay } from './WeekDay'

export default interface RouteData {
  id: number
  route_id: number
  calendar_id: number
  vinculation_route?: number
  route_circular: boolean
  date_init: string
  date_finish: string
  mon: boolean
  tue: boolean
  wed: boolean
  thu: boolean
  fri: boolean
  sat: boolean
  sun: boolean
  out_of_frequency_week_days: WeekDay[]
}
