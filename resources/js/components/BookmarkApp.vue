<template>
  <div>
    <h2 class="text-xl mb-4 font-bold">URL Manager</h2>

    <form @submit.prevent="saveUrl">
      <input v-model="form.url" placeholder="URL" class="input" />
      <input v-model="form.username" placeholder="Username" class="input" />
      <input v-model="form.password" placeholder="Password" class="input" />
      <button type="submit" class="btn">Save</button>
    </form>

    <ul class="mt-6">
      <li v-for="entry in urls" :key="entry.id" class="border p-2 my-2">
        <div><strong>{{ entry.url }}</strong></div>
        <div>{{ entry.username }} / {{ entry.password }}</div>
        <button @click="edit(entry)">Edit</button>
        <button @click="remove(entry.id)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const urls = ref([])
const form = ref({ url: '', username: '', password: '' })
let editingId = null

const fetchUrls = async () => {
  const res = await axios.get('/urls')
  urls.value = res.data
}

const saveUrl = async () => {
  if (editingId) {
    await axios.put(`/urls/${editingId}`, form.value)
    editingId = null
  } else {
    await axios.post('/urls', form.value)
  }
  form.value = { url: '', username: '', password: '' }
  fetchUrls()
}

const edit = (entry) => {
  editingId = entry.id
  form.value = { url: entry.url, username: entry.username, password: entry.password }
}

const remove = async (id) => {
  await axios.delete(`/urls/${id}`)
  fetchUrls()
}

onMounted(fetchUrls)
</script>

<style scoped>
.input { display: block; margin: 5px 0; padding: 5px; width: 100%; }
.btn { background: #4ade80; padding: 6px 12px; margin-top: 10px; }
</style>
