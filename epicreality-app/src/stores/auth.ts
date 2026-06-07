import { defineStore } from 'pinia';
import api from '@/api/axios';

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: JSON.parse(localStorage.getItem('user') || 'null'),
    token: localStorage.getItem('token') || '',
  }),

  getters: {
    isLoggedIn: (state) => !!state.token,
  },

  actions: {

    async login(email: string, password: string) {
      const res = await api.post('/login', {
        email,
        password,
      });

      this.user = res.data.user;
      this.token = res.data.token;

      localStorage.setItem('token', this.token);
      localStorage.setItem('user', JSON.stringify(this.user));
    },

    logout() {
      this.user = null;
      this.token = '';
      localStorage.removeItem('token');
      localStorage.removeItem('user');
    }
  }
});