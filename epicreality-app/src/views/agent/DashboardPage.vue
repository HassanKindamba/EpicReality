<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import {
  IonPage, IonHeader, IonToolbar, IonTitle,
  IonContent, IonGrid, IonRow, IonCol,
  IonCard, IonCardContent,
  IonButton,
  IonList, IonListHeader, IonItem, IonLabel,
  IonBadge
} from '@ionic/vue'

import { getMyProperties, getAgentDashboard } from '@/services/api'

const router = useRouter()

const loading = ref(true)

/* SAFE DEFAULTS */
const stats = ref({
  myProperties: 0,
  activeListings: 0,
  inquiries: 0
})

const properties = ref<any[]>([])
const inquiries = ref<any[]>([])

const loadDashboard = async () => {
  loading.value = true

  try {
    // DASHBOARD API (SAFE)
    const dashboard = await getAgentDashboard().catch(err => {
      console.error('Dashboard API failed:', err)
      return {}
    })

    stats.value = {
      myProperties: dashboard?.myProperties ?? 0,
      activeListings: dashboard?.activeListings ?? 0,
      inquiries: dashboard?.inquiries ?? 0
    }

    inquiries.value = dashboard?.inquiriesList ?? []

    // PROPERTIES API (SAFE)
    const props = await getMyProperties().catch(err => {
      console.error('Properties API failed:', err)
      return []
    })

    properties.value = Array.isArray(props) ? props : []

  } catch (error) {
    console.error('Agent dashboard error:', error)
  } finally {
    loading.value = false
  }
}

onMounted(() => {
  loadDashboard()
})

const goAddProperty = () => {
  router.push('/properties/add')
}
</script>