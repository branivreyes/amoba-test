<script lang="ts" setup>
import TextField from '@/components/TextField.vue'
import TheCalendar from '@/components/schedules-view/TheCalendar.vue'
import AvailableRoutes from '@/components/schedules-view/AvailableRoutes.vue'
import { ref } from 'vue'

const selectedDate = ref('09/08/2022 - 09/08/2022')
</script>

<template>
  <TextField
    class="schedules-view__date-input"
    label="Seleccione Fecha"
    size="large"
    icon="calendar"
    v-model="selectedDate"
  />

  <div class="schedules-view__container">
    <TheCalendar class="schedules-view__calendar" />

    <AvailableRoutes class="schedules-view__available-routes" />
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
  display: flex;
  width: 100%;
  margin-top: 17px;
  height: 546px;
}

.schedules-view__calendar,
.schedules-view__available-routes {
  height: 100%;
}

.schedules-view__calendar {
  width: 640px;
}

.schedules-view__available-routes {
  flex: 1;
  margin-left: 40px;
}
</style>
