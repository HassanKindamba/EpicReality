<template>
  <ion-page>
    <ion-header>
      <ion-toolbar>
        <ion-title>Admin Dashboard</ion-title>
      </ion-toolbar>
    </ion-header>

    <ion-content class="ion-padding">

      <!-- LOADING -->
      <div v-if="loading" class="loading">
        <ion-spinner name="crescent"></ion-spinner>
        <p>Loading dashboard...</p>
      </div>

      <!-- CONTENT -->
      <div v-else>

        <!-- STATS -->
        <ion-grid>
          <ion-row>

            <ion-col size="6">
              <ion-card>
                <ion-card-content class="center">
                  <h1>{{ stats.properties }}</h1>
                  <p>Properties</p>
                </ion-card-content>
              </ion-card>
            </ion-col>

            <ion-col size="6">
              <ion-card>
                <ion-card-content class="center">
                  <h1>{{ stats.agents }}</h1>
                  <p>Agents</p>
                </ion-card-content>
              </ion-card>
            </ion-col>

          </ion-row>
        </ion-grid>

        <!-- RECENT PROPERTIES -->
        <ion-card>
          <ion-card-header>
            <ion-card-title>Recent Properties</ion-card-title>
          </ion-card-header>

          <ion-card-content>

            <div v-if="recent.length === 0" class="empty">
              No properties found
            </div>

            <ion-list v-else>
              <ion-item v-for="p in recent" :key="p.id">
                <ion-label>
                  <h2>{{ p.title || 'No Title' }}</h2>
                  <p>{{ p.location || 'No Location' }}</p>
                </ion-label>
              </ion-item>
            </ion-list>

          </ion-card-content>
        </ion-card>

      </div>

    </ion-content>
  </ion-page>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import {
  IonPage, IonHeader, IonToolbar, IonTitle,
  IonContent, IonGrid, IonRow, IonCol,
  IonCard, IonCardContent, IonCardHeader, IonCardTitle,
  IonList, IonItem, IonLabel, IonSpinner
} from '@ionic/vue'

import { getAdminStats, getProperties } from '../../services/api'

const loading = ref(true)

const stats = ref({
  properties: 0,
  agents: 0
})

const recent = ref<any[]>([])

const loadDashboard = async () => {
  try {
    loading.value = true

    const [statsRes, propertiesRes] = await Promise.all([
      getAdminStats(),
      getProperties()
    ])

    stats.value = {
      properties: statsRes?.properties ?? 0,
      agents: statsRes?.agents ?? 0
    }

    recent.value = Array.isArray(propertiesRes)
      ? propertiesRes.slice(0, 5)
      : []

  } catch (error) {
    console.error('Dashboard error:', error)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  loadDashboard()
})
</script>

<style scoped>
.loading {
  text-align: center;
  margin-top: 80px;
  color: gray;
}

.center {
  text-align: center;
}

.center h1 {
  font-size: 28px;
  margin: 0;
}

.empty {
  text-align: center;
  color: gray;
  padding: 20px;
}
</style>