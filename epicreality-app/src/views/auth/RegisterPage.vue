<template>
  <ion-page>
    <ion-content class="register-bg">

      <div class="register-wrapper">

        <ion-card class="register-card">

          <ion-card-header>
            <ion-card-title class="title">
              Create Account
            </ion-card-title>
            <p class="subtitle">Join Epic Reality</p>
          </ion-card-header>

          <ion-card-content>

            <ion-item class="input">
              <ion-label position="stacked">Name</ion-label>
              <ion-input v-model="name" type="text"></ion-input>
            </ion-item>

            <ion-item class="input">
              <ion-label position="stacked">Email</ion-label>
              <ion-input v-model="email" type="email"></ion-input>
            </ion-item>

            <ion-item class="input">
              <ion-label position="stacked">Password</ion-label>
              <ion-input v-model="password" type="password"></ion-input>
            </ion-item>

            <ion-button expand="block" class="register-btn" @click="handleRegister">
              Register
            </ion-button>

            <ion-button expand="block" fill="outline" class="login-btn" @click="goLogin">
              Back to Login
            </ion-button>

          </ion-card-content>

        </ion-card>

      </div>

    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';

import {
  IonPage,
  IonContent,
  IonCard,
  IonCardHeader,
  IonCardTitle,
  IonCardContent,
  IonItem,
  IonLabel,
  IonInput,
  IonButton
} from '@ionic/vue';

const name = ref('');
const email = ref('');
const password = ref('');

const router = useRouter();

const handleRegister = () => {
  console.log({
    name: name.value,
    email: email.value,
    password: password.value
  });

  alert('Account created successfully!');
  router.push('/login');
};

const goLogin = () => {
  router.push('/login');
};
</script>

<style scoped>
.register-bg {
  --background: linear-gradient(135deg, #0f172a, #1e293b);
  display: flex;
  justify-content: center;
  align-items: center;
}

.register-wrapper {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

.register-card {
  width: 100%;
  max-width: 380px;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.title {
  text-align: center;
  font-size: 22px;
  font-weight: bold;
}

.subtitle {
  text-align: center;
  color: gray;
  margin-top: 5px;
}

.input {
  margin-bottom: 12px;
}

.register-btn {
  margin-top: 10px;
  --background: #16a34a;
}

.login-btn {
  margin-top: 10px;
}
</style>