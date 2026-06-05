<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Login</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content class="ion-padding">

      <ion-item>
        <ion-label position="stacked">Email</ion-label>
        <ion-input v-model="email"></ion-input>
      </ion-item>

      <ion-item>
        <ion-label position="stacked">Password</ion-label>
        <ion-input type="password" v-model="password"></ion-input>
      </ion-item>

      <ion-button expand="block" @click="handleLogin">
        Login
      </ion-button>

    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '@/stores/auth';

import {
  IonPage,
  IonHeader,
  IonToolbar,
  IonTitle,
  IonContent,
  IonItem,
  IonLabel,
  IonInput,
  IonButton
} from '@ionic/vue';

const email = ref('');
const password = ref('');

const router = useRouter();
const auth = useAuthStore();

const handleLogin = async () => {
  try {
    await auth.login(email.value, password.value);

    const user = auth.user;

    if (user.role === 'admin') {
      router.push('/admin');
    } else if (user.role === 'agent') {
      router.push('/agent');
    } else {
      router.push('/properties');
    }

  } catch (e) {
    alert('Login imekataa');
  }
};
</script>