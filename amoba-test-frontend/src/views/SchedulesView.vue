<script lang="ts" setup>
import TextField from '@/components/TextField.vue'
import TheCalendar from '@/components/schedules-view/TheCalendar.vue'
import AvailableRoutes from '@/components/schedules-view/AvailableRoutes.vue'
import { computed, onMounted, ref } from 'vue'
import dayjs, { Dayjs } from 'dayjs'
import { useSchedulesAPI } from '@/api/schedules'
import type Route from '@/types/Route'

const selectedDate = ref(dayjs())

const computedSelectedDate = computed({
  get() {
    return selectedDate.value.format('DD/MM/YYYY')
  },
  set(value: Dayjs | string): void {
    selectedDate.value = value as Dayjs
  }
})

const availableRoutes = ref<Route[]>([])

const { getCalendarSchedules, loadingCalendarSchedules } =
  useSchedulesAPI().useGetCalendarShedules()

const selectedRoute = ref<Route | null>(null)

const disabledWeekDays = computed(() => selectedRoute.value?.route_data.out_of_frequency_week_days)

function setSelectedRoute(route: Route | null) {
  selectedRoute.value = route
}

function fetchCalendarSchedules() {
  getCalendarSchedules({ start_day: selectedDate.value.format('YYYY-MM-DD') }).then(
    ({ routes }) => {
      availableRoutes.value = routes
    }
  )
}

onMounted(() => {
  fetchCalendarSchedules()
})
</script>

<template>
  <TextField
    v-model="computedSelectedDate"
    class="schedules-view__date-input"
    label="Seleccione Fecha"
    size="large"
    icon="calendar"
    type="date"
    @update:model-value="fetchCalendarSchedules"
  />

  <div class="schedules-view__container">
    <TheCalendar
      class="schedules-view__calendar"
      v-model="selectedDate"
      :disabled-week-days="disabledWeekDays"
      @update:model-value="fetchCalendarSchedules"
    />

    <AvailableRoutes
      class="schedules-view__available-routes"
      :available-routes="availableRoutes"
      :loading="loadingCalendarSchedules"
      @selected-route-change="setSelectedRoute"
    />
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/colors';

.schedules-view__date-input {
  width: 311px;

  :deep(.text-field__icon) {
    width: 16px;
    height: 16px;
    background-color: colors.$black;
  }
}

.schedules-view__container {
  display: grid;
  grid-template-columns: 640px auto;
  gap: 40px;
  width: 100%;
  margin-top: 17px;
  min-height: 546px;
}

.schedules-view__calendar,
.schedules-view__available-routes {
  height: 100%;
}
</style>
