import type RouteData from './RouteData'

export default interface Route {
  id: number
  invitation_code: string
  title: string
  route_data: RouteData
}
