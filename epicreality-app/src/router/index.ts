import { createRouter, createWebHistory } from '@ionic/vue-router';
import { RouteRecordRaw } from 'vue-router';

import HomePage from '../views/HomePage.vue';
import LoginPage from '../views/auth/LoginPage.vue';
import RegisterPage from '../views/auth/RegisterPage.vue';

import PropertyListPage from '../views/properties/PropertyListPage.vue';
import PropertyDetailsPage from '../views/properties/PropertyDetailsPage.vue';

import AdminDashboard from '../views/admin/DashboardPage.vue';
import AgentDashboard from '../views/agent/DashboardPage.vue';

const routes: Array<RouteRecordRaw> = [
  { path: '/', redirect: '/login' },

  { path: '/home', name: 'Home', component: HomePage },

  { path: '/login', name: 'Login', component: LoginPage },

  { path: '/register', name: 'Register', component: RegisterPage },

  { path: '/properties', name: 'Properties', component: PropertyListPage },

  { path: '/properties/:id', name: 'PropertyDetails', component: PropertyDetailsPage },

  {
    path: '/admin',
    name: 'AdminDashboard',
    component: AdminDashboard,
    meta: { requiresAuth: true, role: 'admin' }
  },

  {
    path: '/agent',
    name: 'AgentDashboard',
    component: AgentDashboard,
    meta: { requiresAuth: true, role: 'agent' }
  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
});

/*
|--------------------------------------------------------------------------
| SAFE ROUTE GUARD (PRODUCTION VERSION)
|--------------------------------------------------------------------------
*/

router.beforeEach((to, from, next) => {

  const token = localStorage.getItem('token');

  let user = null;

  // SAFE JSON PARSE (avoid crash if localStorage is broken)
  try {
    const storedUser = localStorage.getItem('user');
    user = storedUser ? JSON.parse(storedUser) : null;
  } catch (e) {
    console.error('Invalid user in localStorage');
    localStorage.removeItem('user');
  }

  // 1. AUTH CHECK
  if (to.meta.requiresAuth && !token) {
    return next('/login');
  }

  // 2. ROLE CHECK
  if (to.meta.role) {
    if (!user || user.role !== to.meta.role) {
      return next('/home');
    }
  }

  // 3. CONTINUE
  next();
});

export default router;