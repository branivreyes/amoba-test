import { createRouter, createWebHistory } from 'vue-router'

import { useHeaderTitle } from '@/composables/headerTitle'

const { setTitle: setHeaderTitle } = useHeaderTitle()

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: {
        name: 'schedules'
      }
    },
    {
      path: '/schedules',
      name: 'schedules',
      component: () => import('@/views/SchedulesView.vue'),
      meta: {
        headerTitle: 'Schedules'
      }
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('@/views/DashboardView.vue'),
      meta: {
        headerTitle: 'Dashboard'
      }
    },
    {
      path: '/settings',
      name: 'settings',
      component: () => import('@/views/SettingsView.vue'),
      meta: {
        headerTitle: 'Settings'
      }
    },
    {
      path: '/users',
      name: 'users',
      component: () => import('@/views/UsersView.vue'),
      meta: {
        headerTitle: 'Users'
      }
    },
    {
      path: '/transactions',
      name: 'transactions',
      component: () => import('@/views/TransactionsView.vue'),
      meta: {
        headerTitle: 'Transactions'
      }
    }
  ]
})

router.afterEach((to) => {
  if (to.meta.headerTitle) {
    setHeaderTitle(to.meta.headerTitle as string)
  }
})

export default router
