import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/ApplicantList.vue')
    },
    {
      path: '/applicant-form',
      name: 'applicantForm',
      component: () => import('../views/ApplicantForm.vue')
    }
  ]
})

export default router
