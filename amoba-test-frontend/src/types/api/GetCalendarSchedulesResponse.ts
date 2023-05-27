import type Route from '@/types/Route'

export default interface GetCalendarSchedulesResponse {
  services: any[]
  routes: Route[]
  reservations: any[]
}
