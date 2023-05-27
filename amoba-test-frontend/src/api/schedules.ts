import { useAxios } from '@/composables/axios'
import type GetCalendarSchedulesResponse from '@/types/api/GetCalendarSchedulesResponse'
import { ref } from 'vue'

const axios = useAxios()

function useGetCalendarShedules() {
  const loading = ref(false)

  async function getCalendarSchedules(params: {
    start_day?: string
    end_day?: string
    route_id?: string
  }) {
    loading.value = true

    const response = await axios.get<GetCalendarSchedulesResponse>('calendar_schedules', { params })

    loading.value = false

    return response.data
  }

  return {
    getCalendarSchedules,
    loadingCalendarSchedules: loading
  }
}

export function useSchedulesAPI() {
  return {
    useGetCalendarShedules
  }
}
